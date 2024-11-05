<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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
}
