<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $fillable = [
       'nombre','direccion','logotipo','correo', 'telefono', 'pagina_web' 
      ];

      public function empresas()
      {
          return $this->hasMany(Alumno::class, 'escuela_id');
      }
}
