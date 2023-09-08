<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumno::create([
            'nombre' => 'Jairo',
            'apellido' => 'Delgado',
            'escuela_id' => 1,
            'fecha_nacimiento'=> '2000-05-15',
            'ciudad_natal' => '',           
        ]);

        Alumno::create([
            'nombre' => 'Luis',
            'apellido' => 'Luna',
            'escuela_id' => 1,
            'fecha_nacimiento'=> '2010-05-15',
            'ciudad_natal' => '',           
        ]);

        Alumno::create([
            'nombre' => 'Maria',
            'apellido' => 'Paz',
            'escuela_id' => 2,
            'fecha_nacimiento'=> '2006-05-20',
            'ciudad_natal' => '',           
        ]);

        Alumno::create([
            'nombre' => 'Luisa',
            'apellido' => 'Martinez',
            'escuela_id' => 2,
            'fecha_nacimiento'=> '2008-05-28',
            'ciudad_natal' => '',           
        ]);

        Alumno::create([
            'nombre' => 'Liliana',
            'apellido' => 'Mora',
            'escuela_id' => 1,
            'fecha_nacimiento'=> '2007-05-21',
            'ciudad_natal' => '',           
        ]);
    }
}
