<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    public function carts(){
        return $this->belongsTo(recruiteList::class);
    }

    public function employers(){
        return $this->belongsToMany(Employers::class,'recruite_lists','employerId','empId ')->withPivot('created_at','updated_at','status');
    }
}
