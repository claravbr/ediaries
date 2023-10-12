<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DEscolares extends Model
{
    protected $table = 'descolares';

    use HasFactory;

    protected $fillable = [
        'nivelAcademico',
        'centroEducativo',
        'repetidor'
    ];

    /**
     * Get the child that owns the descolares.
     */
    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
