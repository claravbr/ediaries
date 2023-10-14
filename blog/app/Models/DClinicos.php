<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DClinicos extends Model
{
    protected $table = 'dclinicos';

    use HasFactory;

    protected $fillable = [
        'child_id',
        'enfermedad',
        'tdah',
        'tdahTipo',
        'tdahEdad',
        'dificultad',
        'medicacion',
        'medicacionAntiguedad',
        'medicacionInfo',
        'intervencion'
    ];

    /**
     * Get the child that owns the dclinicos.
     */
    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
