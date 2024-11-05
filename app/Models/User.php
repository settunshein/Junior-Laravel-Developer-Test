<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function getThumbnailImagePath()
    {
        if ($this->avatar) {
            return asset('storage/avatar/thumbnail/'.$this->avatar);
        } else {
            return "
                https://ui-avatars.com/api/?background=1E90FF&color=fff&name=$this->name
            ";
        }
    }

    public function getMediumImagePath()
    {
        if ($this->avatar) {
            return asset('storage/avatar/medium/'.$this->avatar);
        } else {
            return "
                https://ui-avatars.com/api/?background=1E90FF&color=fff&name=$this->name
            ";
        }
    }

    public function checkIsEditable()
    {
        /*
        $auth_user = auth()->user();

        if ($auth_user->role === 'administrator' && $auth_user->remark === 'superadmin') {
            return '';
        }

        if ($auth_user->role === 'administrator' && $auth_user->id === $this->id) {
            return '';
        }

        return 'disabled';
        */

        $auth_user = auth()->user();

        return ( $auth_user->role === 'administrator' &&
               ( $auth_user->remark === 'superadmin' || $auth_user->id === $this->id) )
               ? '' : 'disabled';
    }

    public function checkIsDeletable()
    {
        /*
        $auth_user = auth()->user();

        if ($this->role === 'administrator' && $this->remark === 'superadmin') {
            return 'disabled';
        }

        if ($auth_user->role === 'administrator' && $auth_user->remark === 'superadmin') {
            return '';
        }

        if ($auth_user->role === 'administrator' && $auth_user->remark !== 'superadmin') {
            return 'disabled';
        }

        return 'disabled';
        */

        $auth_user = auth()->user();

        if ($this->role === 'administrator' && $this->remark === 'superadmin') {
            return 'disabled';
        }

        return ($auth_user->role === 'administrator' && $auth_user->remark === 'superadmin')
               ? '' : 'disabled';
    }
}
