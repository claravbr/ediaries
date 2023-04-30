<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Usuario
{
    public static function boot(){
        parent::boot();

        static::creating(function($child){
            $child->forceFill(['type'=>self::class]);
        });
    }

    public static function booted(){
        static::addGlobalScope('doctor', function($builder){
            $builder->where('type',self::class);
        });
    }

    protected $table = 'child';

    /**
     * The ActividadesFavoritas that belong to the Child.
     */
    public function actividadesFavoritas()
    {
        return $this->belongsToMany(ActividadFavorita::class, 'childactividadfavorita', 'child_id', 'actividadfavorita_id');
    }
}
