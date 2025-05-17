<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testpage extends Model
{
    use HasFactory;

    protected $casts=[
        'section1'=>'array',
        'section2'=>'array'
    ];
}
