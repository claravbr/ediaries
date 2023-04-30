<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Usuario
{
    use HasFactory;

    /**
     * The ActividadesFavoritas that belong to the Child.
     */
    public function actividadesFavoritas()
    {
        return $this->belongsToMany(ActividadFavorita::class, 'child_actividadfavorita', 'child_id', 'actividadfavorita_id');
    }
}
