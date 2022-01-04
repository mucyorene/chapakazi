<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruiteList extends Model
{
    use HasFactory;

    //Used
    public function employee(){
        return $this->belongsTo(employees::class,"empId");
    }

    //Employers not used
    public function employers(){
        return $this->belongsTo(Employers::class,"employerId");
    }
}
