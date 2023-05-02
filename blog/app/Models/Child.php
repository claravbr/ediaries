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

}
