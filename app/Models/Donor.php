<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $table = 'donors';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'dob',
        'gender',
        'blood_group',
        'province',
        'district',
        'address',
        'is_verified',
        'is_active',
    ];

    protected $casts = [
        'dob' => 'date',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];
}
