<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitedEmployee extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(employees::class, 'employeeId');
    }
}
