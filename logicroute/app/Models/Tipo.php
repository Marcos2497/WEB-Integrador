<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';

    protected $fillable = [
        'nombre'
    ];

    //Relacion uno a muchos con Alimento
    public function alimentos(){
        return $this->hasMany(Food::class);
    }
}
