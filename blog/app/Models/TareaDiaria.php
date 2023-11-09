<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaDiaria extends Model
{
    protected $table = 'tareadiaria';

    protected $fillable = [
        'child_id',
        'categoria_id',
        'nombre',
        'fechaIntroduccion',
        'fechaLimite',
        'prioridad',
        'duracion',
        'terminada'
    ];

    /**
     * Get the child that owns the tareadiaria.
     */
    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    /**
     * Get the categoria that owns the tareadiaria.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
