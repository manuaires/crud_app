<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'code',
        'name',
        'plataforma',
        'release_date',
        'image',
        'description'
    ];
}