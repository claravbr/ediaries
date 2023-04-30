<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DEscolares extends Model
{
    use HasFactory;

    protected $fillable = [
        'nivelAcademico',
        'centroEducativo',
        'repetidor'
    ];
}
