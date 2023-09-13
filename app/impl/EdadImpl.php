<?php

namespace App\impl;

use App\Contracts\iTemplate;
use Carbon\Carbon;

class EdadImpl implements iEdad
{
    protected $edad;

    public function calcularEdad($edadNacimiento)
    {
        $fechaNacimiento = Carbon::parse($edadNacimiento); 
        $this->edad = $fechaNacimiento->age;    
        return $this->edad;          
    }
   
}
