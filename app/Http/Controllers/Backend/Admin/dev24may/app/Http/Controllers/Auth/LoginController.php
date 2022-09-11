<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\User;
use App\Models\Customer;
use App\Models\Cart;
use Session;
use Illuminate\Http\Request;
use CoreComponentRepository;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Jenssegers\Agent\Facades\Agent;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /*protected $redirectTo = '/';*/


    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if(request()->get('query') == 'mobile_app'){
            request()->session()->put('login_from', 'mobile_app');
        }
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        if (session('login_from') == 'mobile_app') {
            return $this->mobileHandleProviderCallback($request, $provider);
        }
        try {
            if ($provider == 'twitter') {
                $user = Socialite::driver('twitter')->user();
            } else {
                $user = Socialite::driver($provider)->stateless()->user();
            }
        } catch (\Exception $e) {
            flash("Something Went wrong. Please try again.")->error();
            return redirect()->route('user.login');
        }

        //check if provider_id exist
        $existingUserByProviderId = User::where('provider_id', $user->id)->first();

        if ($existingUserByProviderId) {
            //proceed to login
            auth()->login($existingUserByProviderId, true);
        }
        else {
            //check if email exist
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                //update provider_id
                $existing_User = $existingUser;
                $existing_User->provider_id = $user->id;
                $existing_User->save();

                //proceed to login
                auth()->login($existing_User, true);
            } else {
                //create a new user
                $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->email_verified_at = date('Y-m-d Hms');
                $newUser->provider_id = $user->id;
                $newUser->save();

                //make user a customer
                $customer = new Customer;
                $customer->user_id = $newUser->id;
                $customer->save();

                //proceed to login
                auth()->login($newUser, true);
            }
        }

        if (session('temp_user_id') != null) {
            Cart::where('temp_user_id', session('temp_user_id'))
                ->update([
                    'user_id' => auth()->user()->id,
                    'temp_user_id' => null
                ]);

            Session::forget('temp_user_id');
        }

	$duplicated = Cart::select('product_id', DB::raw('count(`product_id`) as occurences'))
                ->where('user_id', auth()->user()->id)
                ->groupBy('product_id')
                ->having('occurences', '>', 1)
                ->get();
            //dd($duplicated);
            if(count($duplicated) > 0) {
                foreach ($duplicated as $duplicate) {
                    $dontDeleteThisRow = Cart::where('product_id', $duplicate->product_id)->orderby('created_at', 'desc')->first();
                    //dd($dontDeleteThisRow);
                    Cart::where('product_id', $duplicate->product_id)
                        ->where('user_id', auth()->user()->id)
                        ->where('id', '!=', $dontDeleteThisRow->id)
                        ->delete();
                }
            }	


        if (session('link') != null) {
            return redirect(session('link'));
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function mobileHandleProviderCallback($request, $provider)
    {
        $return_provider = '';
        $result = false;
        if($provider) {
            $return_provider = $provider;
            $result = true;
        }
        return response()->json([
            'result' => $result,
            'provider' => $return_provider
        ]);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required_without:phone',
            'phone'    => 'required_without:email',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        if ($request->get('phone') != null) {
            return ['phone' => "+{$request['country_code']}{$request['phone']}", 'password' => $request->get('password')];
        } elseif ($request->get('email') != null) {
            return $request->only($this->username(), 'password');
        }
    }

    /**
     * Check user's role and redirect user based on their role
     * @return
     */
    public function authenticated()
    {
        if (session('temp_user_id') != null) {
            Cart::where('temp_user_id', session('temp_user_id'))
                ->update(
                    [
                        'user_id' => auth()->user()->id,
                        'temp_user_id' => null
                    ]
                );

            Session::forget('temp_user_id');
        }
		
	
	$duplicated = Cart::select('product_id', DB::raw('count(`product_id`) as occurences'))
                ->where('user_id', auth()->user()->id)
                ->groupBy('product_id')
                ->having('occurences', '>', 1)
                ->get();
            //dd($duplicated);
            if(count($duplicated) > 0) {
                foreach ($duplicated as $duplicate) {
                    $dontDeleteThisRow = Cart::where('product_id', $duplicate->product_id)->orderby('created_at', 'desc')->first();
                    //dd($dontDeleteThisRow);
                    Cart::where('product_id', $duplicate->product_id)
                        ->where('user_id', auth()->user()->id)
                        ->where('id', '!=', $dontDeleteThisRow->id)
                        ->delete();
                }
            }


	
		/*Start User Login Activity*/
		$device = $_SERVER['HTTP_USER_AGENT'];
		$device =  str_replace(',','~!',$device);
		$todayDate = Carbon::now();
		DB::table('users')
			  ->where('id', user())
			  ->update(['last_login' => $todayDate,'device' => $device]);

		update_history('users','update',user(),'last_login,device','10');
		/*End User Login Activity*/
		

        if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff') {

           // CoreComponentRepository::instantiateShopRepository();
            return redirect()->route('admin.dashboard');
        } else {

            if (session('link') != null) {
                return redirect(session('link'));
            } else {
                return redirect()->route('dashboard');
            }
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        flash(translate('Invalid login credentials'))->error();
        return back();
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        if (auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')) {
            $redirect_route = 'login';
        } else {
			
            $redirect_route = 'home';
        }

        //User's Cart Delete
        if (auth()->user()) {
            Cart::where('user_id', auth()->user()->id)->delete();
        }
		
		
		/*Start User Login Activity*/		
		$device = $_SERVER['HTTP_USER_AGENT'];
		$device =  str_replace(',','~!',$device);
		
		$todayDate = Carbon::now();
		DB::table('users')
              ->where('id', user())
              ->update(['last_logout' => $todayDate,'device' => $device]);
		update_history('users','update',user(),'last_logout,device','10');
		/*End User Login Activity*/


        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route($redirect_route);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}