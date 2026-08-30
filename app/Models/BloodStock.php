<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    protected $fillable = [
        'blood_group',
        'units',
    ];
}
