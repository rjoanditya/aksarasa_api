<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibParts extends Model
{
    use HasFactory;

    protected $table = 'lib_parts';
    protected $guarded = ['id'];
}