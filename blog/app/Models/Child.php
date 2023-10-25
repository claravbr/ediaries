<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Usuario
{
    protected $table = 'child';

    /**
     * The actividadesfavoritas that belong to the child.
     */
    public function actividadesfavoritas()
    {
        return $this->belongsToMany(ActividadFavorita::class, 'child_actividadfavorita', 'child_id', 'actividadfavorita_id');
    }

    /**
     * Get the tareasdiarias of the child.
     */
    public function tareasdiarias()
    {
        return $this->hasMany(TareaDiaria::class)->with('categoria');
    }

    /**
     * Get the diarioemociones of the child.
     */
    public function diarioemociones()
    {
        return $this->hasMany(DiarioEmociones::class);
    }

    /**
     * Get the dclinicos record associated with the child.
     */
    public function dclinicos()
    {
        return $this->hasOne(DClinicos::class);
    }

    /**
     * Get the descolares record associated with the child.
     */
    public function descolares()
    {
        return $this->hasOne(DEscolares::class);
    }

    /**
     * Get the dpersonales record associated with the child.
     */
    public function dpersonales()
    {
        return $this->hasOne(DPersonales::class);
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id', 'usuario_id');
    }

}
