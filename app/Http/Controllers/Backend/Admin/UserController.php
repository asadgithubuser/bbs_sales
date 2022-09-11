<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

/* included models */
use App\Models\Designation;
use App\Models\User;
use App\Models\Role;
use App\Models\Level;
use App\Models\Office;
use App\Models\Countrie;
use App\Models\Subscriber;
use App\Models\Department;

use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;

use App\Models\SalesCenter;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if (Gate::allows('user_management', $user)) 
        {
            if(Gate::allows('all_users',$user))
            {            
                menuSubmenu('roles', 'allUsers');

                $roles = Role::where('status', 1)->get();
                $offices = Office::where('status', 1)->get();
                $departments = Department::where('status', 1)->get();
                $designations = Designation::where('status', 1)->get();

                $users = User::with('role', 'office', 'designation', 'department')->latest()->paginate(25);
                
                return view('backend.admin.user.index', compact('users', 'roles', 'offices', 'designations', 'departments'));
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicUserList()
    {
        $user = Auth::user();

        if (Gate::allows('user_management', $user)) 
        {
            if(Gate::allows('public_users',$user))
            {                
               
                menuSubmenu('roles', 'allPublicUsers');

                $offices = Office::where('status', 1)->get();
                $designations = Designation::where('status', 1)->get();

                $users = User::with('role', 'office', 'designation')
                                ->where('role_id', 10)
                                ->latest()
                                ->paginate(25);
                
                return view('backend.admin.user.publicUserList', compact('users', 'offices', 'designations'));
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function systemUserList()
    {
        $user = Auth::user();

        if (Gate::allows('user_management', $user)) 
        {
            if(Gate::allows('system_users',$user))
            {                
               
                menuSubmenu('roles', 'allSystemUsers');

                $offices = Office::where('status', 1)->get();
                $departments = Department::where('status', 1)->get();
                $designations = Designation::where('status', 1)->get();

                $users = User::with('role', 'office', 'designation', 'department')
                                ->where('role_id', '<>', 10)
                                ->latest()
                                ->paginate(25);
                
                return view('backend.admin.user.systemUserList', compact('users', 'offices', 'designations', 'departments'));
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribers()
    {
        $user = Auth::user();

        if (Gate::allows('user_management', $user)) 
        {
            if(Gate::allows('subscribers', $user))
            {                
               
                menuSubmenu('roles', 'subscribers');

                $users = Subscriber::latest()->paginate(25);
                
                return view('backend.admin.user.subscriber', compact('users'));
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if (Gate::allows('user_management', $user)) 
        {
            if(Gate::allows('add_user',$user))
            {                
                
                menuSubmenu('roles', 'addUser');
                
                $roles = Role::where('status', 1)->get();
                $offices = Office::where('status', 1)->get();
                $departments = Department::where('status', 1)->get();
                $levels = Level::get();
                $designations = Designation::where('status', 1)->get();
                $salesCenters = SalesCenter::where('status', 1)->get();
                $divisions = Division::where('status',1)->get();
                $districts = District::where('status',1)->get();
                $upazilas = Upazila::where('status',1)->get();
                
                
                return view('backend.admin.user.create', compact('roles', 'offices', 'levels', 'designations', 'departments', 'salesCenters','divisions','districts','upazilas'));
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        // dd($request->all());
        $request->validate([
            'role_id'           => 'required',
            'level_id'          => 'required',
            'office_id'         => 'required',
            'class'         => 'required',
            'designation_id'    => 'required',
            'username'          => 'unique:users',
            'password'          => 'required|min:8',
            'first_name'        => 'required|max:255',
            'last_name'         => 'required|max:255',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'mobile'            => 'required|unique:users',
            'email'             => 'required|unique:users',
            'photo'             => 'max:2048',
            'signature'         => 'max:1024',
        ]);

        $user = new User;
        $user->division_id          = $request->division_id ? $request->division_id : null;
        $user->upazila_id           = $request->upazila_id ? $request->upazila_id : null;
        $user->district_id          = $request->district_id ? $request->district_id : null;

        $user->role_id              = $request->role_id;
        $user->sales_center         = $request->salesCenter;
        $user->level_id             = $request->level_id;
        $user->office_id            = $request->office_id;
        $user->class                = $request->class;
        $user->department_id        = $request->department_id;
        $user->designation_id       = $request->designation_id;
        $user->password             = bcrypt($request->password);
        $user->first_name           = $request->first_name;
        $user->middle_name          = $request->middle_name;
        $user->last_name            = $request->last_name;
        $user->username             = Str::lower($request->first_name.$request->last_name);
        $user->present_address      = $request->present_address;
        $user->permanent_address    = $request->permanent_address;
        $user->country_id           = $request->country_id;
        $user->postal_code          = $request->postal_code;
        $user->mobile               = $request->mobile;
        $user->email                = $request->email;
        $user->status               = 1;
        $user->created_by           = Auth::id();

        if($request->hasFile('photo'))
        {
            $cp = $request->file('photo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'photo'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('users/'.$randomFileName, File::get($cp));

            $user->photo = $randomFileName;
            $user->save();
      	} 

        if($request->hasFile('signature'))
        {
            $cp = $request->file('signature');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'signature'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('signatures/'.$randomFileName, File::get($cp));

            $user->signature = $randomFileName;
            $user->save();
        }

        $user->save();

        // return redirect()->route('admin.user.index')->with('success', 'User Created Successfully');
        return back()->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('view_user',$userr))
            {                
               
                $user = User::with('level', 'office', 'designation', 'user', 'user_update', 'role', 'department')
                    ->where('id', $id)
                    ->first();

                return view('backend.admin.user.show', compact('user'));
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('edit_user',$userr))
            { 
                $salesCenters = SalesCenter::where('status', 1)->get();

                $roles = Role::where('status', 1)->get();
                $levels = Level::get();
                $offices = Office::where('status', 1)->get();
                $designations = Designation::where('status', 1)->get();
                $departments = Department::where('status', 1)->get();
                $divisions = Division::where('status',1)->get();
                $districts = District::where('status',1)->get();
                $upazilas = Upazila::where('status',1)->get();
                $user = User::with('designation')
                            ->where('id', $id)
                            ->first();

                return view('backend.admin.user.edit', compact('roles','salesCenters', 'levels', 'offices', 'designations', 'user', 'departments','divisions','districts','upazilas'));
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request,$username)
    {
        $userId = $request->user;
        $roles = Role::where('status', 1)->get();
        $levels = Level::get();
        $offices = Office::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();

        $user = User::find($userId);
        if(Auth::user()->id == $userId)
        {

            return view('backend.admin.user.editProfile', compact('roles', 'levels', 'offices', 'designations', 'user', 'departments'));
        }
        else
        {
            abort(401);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $request->validate([
            'role_id'           => 'required',
            'level_id'          => 'required',
            'office_id'         => 'required',
            'designation_id'    => 'required',
            'first_name'        => 'required|max:255',
            'last_name'         => 'required|max:255',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'mobile'            => 'required',
            'email'             => 'required|email|unique:users,email,'.$user->id,
            'photo'             => 'max:2048',
        ]);

        $user->division_id          = $request->division_id ? $request->division_id : $user->division_id;
        $user->upazila_id           = $request->upazila_id ? $request->upazila_id : $user->upazila_id;
        $user->district_id          = $request->district_id ? $request->district_id : $user->district_id;

        $user->role_id              = $request->role_id;
        $user->level_id             = $request->level_id;
        $user->department_id        = $request->department_id;
        $user->office_id            = $request->office_id;
        $user->designation_id       = $request->designation_id;
        $user->first_name           = $request->first_name;
        $user->middle_name          = $request->middle_name;
        $user->last_name            = $request->last_name;
        $user->present_address      = $request->present_address;
        $user->permanent_address    = $request->permanent_address;
        $user->postal_code          = $request->postal_code;
        $user->mobile               = $request->mobile;
        $user->email                = $request->email;
        $user->status               = $request->status;
        $user->updated_by           = Auth::id();

        if($request->hasFile('photo'))
        {
            $cp = $request->file('photo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'photo'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('users/'.$randomFileName, File::get($cp));

            if($user->photo)
            {
                $f = 'users/'.$user->photo;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $user->photo = $randomFileName;
            $user->save();
      	} 

        if($request->hasFile('signature'))
        {
            $cp = $request->file('signature');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'signature'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('signatures/'.$randomFileName, File::get($cp));

            if($user->signature)
            {
                $f = 'users/'.$user->signature;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $user->signature = $randomFileName;
            $user->save();
        } 

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User Information Updated Successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $user)
    {
        $request->validate([
            'first_name'        => 'required|max:255',
            'last_name'         => 'required|max:255',
            'present_address'   => 'required',
            'permanent_address' => 'required',
            'mobile'            => 'required',
            'email'             => 'required|email|unique:users,email,'.$user,
        ]);

        $current_user = User::find($user);

        $current_user->level_id             = $request->level_id;
        $current_user->office_id            = $request->office_id;
        $current_user->designation_id       = $request->designation_id;
        $current_user->class                = $request->class;
        $current_user->department_id        = $request->department_id;
        $current_user->first_name           = $request->first_name;
        $current_user->middle_name          = $request->middle_name;
        $current_user->last_name            = $request->last_name;
        $current_user->present_address      = $request->present_address;
        $current_user->permanent_address    = $request->permanent_address;
        $current_user->country_id           = $request->country_id;
        $current_user->postal_code          = $request->postal_code;
        $current_user->mobile               = $request->mobile;
        $current_user->email                = $request->email;
        $current_user->status               = $request->status;;
        $current_user->updated_by           = Auth::id();

        if($request->hasFile('photo'))
        {
            $cp = $request->file('photo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $current_user->id.'photo'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('users/'.$randomFileName, File::get($cp));

            if($current_user->photo)
            {
                $f = 'users/'.$current_user->photo;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $current_user->photo = $randomFileName;
            $current_user->save();
      	} 

        if($request->hasFile('signature'))
        {
            $cp = $request->file('signature');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $current_user->id.'signature'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('signatures/'.$randomFileName, File::get($cp));

            if($current_user->signature)
            {
                $f = 'users/'.$current_user->signature;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $current_user->signature = $randomFileName;
            $current_user->save();
        } 

        $current_user->save();
        
        return back()->with('success', 'Profile Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $old_password = User::where('id', $user)->first();
        if (!empty($old_password))
        {
            $password = Hash::check($request->current_password, $old_password->password);
            if ($password)
            {
                $current_user = User::find($user);
                $current_user->password = bcrypt($request->password);
                $current_user->updated_by = Auth::id();
                $current_user->save();

                return back()->with('success', 'Password Updated Successfully');

            } else {
                return back()->with('error', 'Password did not matched!');
            }
        } else {
            return back()->with('error', 'Password can not be empty');
        }
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block(User $user)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('block_user',$userr))
            { 
                
                if ($user->status == 0) {
                    $user->status       = 1;
                    $user->updated_by   = Auth::id();
                }
                else if ($user->status == 1) {
                    $user->status       = 0;
                    $user->updated_by   = Auth::id();
                }

                $user->save();

                return redirect()->route('admin.user.index')->with('success', 'User Blocked Successfully.');
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('delete_user',$userr))
            {                
               
                if ($user->status == 2) {
                    $user->status       = 1;
                    $user->updated_by   = Auth::id();
                }
                else if ($user->status == 0 || $user->status == 1) {
                    $user->status       = 2;
                    $user->updated_by   = Auth::id();
                }
        
                $user->save();
        
                return redirect()->route('admin.user.index')->with('success', 'User Deleted Successfully.');
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }
}
