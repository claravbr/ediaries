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

    /**
     * Get the child that owns the tareadiaria.
     */
    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
