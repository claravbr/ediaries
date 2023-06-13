<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Get the tareasdiarias for the categoria.
     */
    public function tareasdiarias()
    {
        return $this->hasMany(TareaDiaria::class);
    }
}
