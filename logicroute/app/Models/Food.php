<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Food extends Model
{
    use HasFactory;
    protected $table = 'food';

    protected $fillable = [
        'name',
        'tipo_id',
        'precio',
        'duracion_dias',

    ];

    // Relación uno a muchos con Tipo
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
