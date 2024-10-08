<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    public function recruitedPending(){
        return $this->hasMany(recruiteList::class, 'empId');
    }

    public function employers(){
        return $this->belongsToMany(Employers::class,'recruite_lists','employerId','empId ')->withPivot('created_at','updated_at','status');
    }

    public function myRatings(){
        return $this->hasMany(Ratings::class,'employeeId');
    }

    public function recruted(){
        return $this->hasMany(RecruitedEmployee::class,"employeeId");
    }
}
