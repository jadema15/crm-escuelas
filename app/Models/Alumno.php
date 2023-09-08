<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre','apellido','escuela_id','fecha_nacimiento', 'ciudad_natal' 
       ];

    public function escuela()
    {
        return $this->belongsTo(Escuela::class, 'escuela_id');
    }
}
