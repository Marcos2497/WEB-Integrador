<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraestructura extends Model
{
    use HasFactory;

    protected $table = 'infraestructuras';

    protected $fillable = [
        'nombre',
        'capacidad_maxima',
        'capacidad_disponible',
        'estado',
        'latitude',
        'longitude',
    ];

    //Relacion uno a uno con Barn
    public function barn()
    {
        return $this->hasOne(Barn::class, 'infraestructura_id'); // Un galpón está ligado a una infraestructura
    }
}
