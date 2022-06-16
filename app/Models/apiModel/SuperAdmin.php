<?php

namespace App\Models\apiModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    use HasFactory;
    protected $fillable=[
        'Names',
        'email',
        'username',
        'password',
        'profilePicture'
    ];
}
