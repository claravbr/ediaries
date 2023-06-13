<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadFavorita extends Model
{
    protected $table = 'actividadfavorita';
    protected $fillable = [
        'nombre'
    ];

    /**
     * The childs that belong to the actividadfavorita.
     */
    public function childs()
    {
        return $this->belongsToMany(Child::class, 'child_actividadfavorita', 'actividadfavorita_id', 'child_id');
    }

    /**
     * The children that belong to the actividadfavorita
     */
    public function children()
    {
        return $this->belongsToMany(Child::class, 'child_actividad_favorita', 'actividad_favorita_id', 'child_id');
    }
}
