<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }

    public function getThumbnailImagePath()
    {
        if ($this->logo) {
            return asset('storage/company/thumbnail/'.$this->logo);
        } else {
            return "
                https://ui-avatars.com/api/?background=1E90FF&color=fff&name=$this->name
            ";
        }
    }

    public function getMediumImagePath()
    {
        if ($this->logo) {
            return asset('storage/company/medium/'.$this->logo);
        } else {
            return "
                https://ui-avatars.com/api/?background=1E90FF&color=fff&name=$this->name
            ";
        }
    }
}
