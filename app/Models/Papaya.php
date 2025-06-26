<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papaya extends Model
{
    use HasFactory;
    // In Papaya.php
    protected $guarded = [];


    protected $casts=[
        'sec2imagez'=>'array',
        'sec4imagez'=>'array',
        'sec5imagez'=>'array',
        'sec6imagez'=>'array',
        'sec7imagez'=>'array',
        'sec8imagez'=>'array',
        'sec9imagez'=>'array',
        'sec10imagez'=>'array',

    ];
}
