<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DPersonales extends Model
{
    use HasFactory;
    protected $table = 'dpersonales';

    protected $fillable = [
        'child_id',
        'sexo',
        'peso',
        'altura',
        'fnacimiento'
    ];

    /**
     * Get the child that owns the dpersonales.
     */
    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
