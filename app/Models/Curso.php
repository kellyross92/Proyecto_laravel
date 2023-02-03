<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    //protected $fillable = ["name", "descripcion", "categoria"]; // campos a ignorar
    protected $guarded = ['status'];    // campos a ignorar

    public function getRouteKeyName() // funcion que cambia lo que trae la variable en el controlador
    {   //retornaba la ID
        return 'slug'; // ahora retorna el nombre del curso
    }
}