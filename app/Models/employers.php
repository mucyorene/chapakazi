<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employers extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'fullNames',
        'phone',
        'email',
        'address',
        'username',
        'password',
        'biography',
        'profile'
    ];
    //Access to employees

    public function employees(){
        return $this->hasMany(recruiteList::class,"employerId");
    }

    //From recruited list
    public function recruitedEmployees(){
        return $this->hasMany(RecruitedEmployee::class,'employerId');
    }
    
    //
    public function recruited(){
        return $this->belongsTo(recruiteList::class);
    }

    // return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');

}
