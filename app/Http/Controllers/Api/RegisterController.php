<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class RegisterController extends BaseController
{
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'username' => ['required'],
            'password' => ['required','min:6'],
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        if (Auth::attempt(['email'=>$request->username,'password'=>$request->password]) or Auth::attempt(['mobile'=>$request->username,'password'=>$request->password]))
        {
            if(auth()->user()->status == 1 && auth()->user()->role_id==9 )
            {
                if (auth()->user()->role_id) 
                {
                    $user = Auth::user(); 
                    $user->token =  $user->createToken('MyApp')-> accessToken;
                    $success= $user;
           
                    return $this->sendResponse($success, 'User login successfully.');
                }else {
                    return $this->sendError('error', 'You Dont have any user role',400);  
                }
            }else{
                return $this->sendError('error', 'Invalid user..!',400);
            }

        } else {
            return $this->sendError('error', 'Email or Phone or Password is invalid',400);
        }
    }
}