<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DPersonales extends Model
{
    use HasFactory;

    protected $fillable = [
        'sexo',
        'peso',
        'altura',
        'fnacimiento'
    ];
}
