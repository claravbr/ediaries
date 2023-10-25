<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiarioEmociones extends Model
{
    use HasFactory;

    protected $table = 'diarioemociones';

    protected $fillable = [
        'child_id',
        'fecha',
        'emocion',
        'descripcion'
    ];

    /**
     * Get the child that owns the diarioemociones.
     */
    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
