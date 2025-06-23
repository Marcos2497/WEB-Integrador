<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barn extends Model
{
    use HasFactory;

    protected $table = 'barns';

    protected $fillable = [
        'infraestructura_id', // Incluye la clave foránea
    ];

    // Relación uno a uno con Coordenada
    public function infraestructura()
    {
        return $this->belongsTo(Infraestructura::class); // este tiene la clave foránea
    }
}
