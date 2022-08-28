<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user_update()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function country()
    {
        return $this->belongsTo(Countrie::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
    public function union()
    {
        return $this->belongsTo(Union::class);
    }
    public function mouza()
    {
        return $this->belongsTo(Mouza::class);
    }

    public function salesCenter()
    {
        return $this->belongsTo(SalesCenter::class,'sales_center');
    }

    public function levelCheckDg($userId)
    {
    
        $user = $this;
        
        $level = $this->where('id',$userId)->where('upazila_id',null)->where('division_id',null)->where('district_id',null)->where('role_id',3)->first();
        
        if($level)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    public function levelCheckDiv($userId)
    {
        $user = $this;
        
        $level = $this->where('id',$userId)->where('division_id',$user->division_id)->where('district_id',null)->first();
        
        if($level)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function levelCheckDc($userId)
    {
        $user = $this;
        $level = $this->where('id',$userId)->where('division_id',$user->division_id)->where('district_id',$user->district_id)->where('upazila_id',null)->first();

        if($level)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function levelCheckUpazila($userId)
    {
        $level = $this->where('id',$userId)->where('division_id','<>',null)->where('district_id','<>',null)->where('upazila_id','<>',null)->first();
        
        if($level)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
