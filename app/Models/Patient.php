<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;


    protected $fillable = [

        'cin',
        'nom',
        'email',
        'age',
        'tel',
        'mot_de_pass',
        'sexe',
        'image'
    ];
}
