<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadFavorita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];

    /**
     * The children that belong to the actividadfavorita
     */
    public function children()
    {
        return $this->belongsToMany(Child::class, 'child_actividad_favorita', 'actividad_favorita_id', 'child_id');
    }
}
