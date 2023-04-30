<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaDiaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fechaIntroduccion',
        'fechaLimite',
        'prioridad',
        'duracion'
    ];
}
