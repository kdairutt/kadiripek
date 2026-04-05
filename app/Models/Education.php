<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'type',
        'school',
        'department',
        'start_year',
        'end_year',
        'is_current',
        'description',
        'order',
    ];
}