<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Usuario
{
    protected $table = 'child';

    /**
     * Get the tareasdiarias for the child.
     */
    public function tareasdiarias()
    {
        return $this->hasMany(TareaDiaria::class);
    }

    /**
     * Get the diarioemociones for the child.
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

}
