<?php

namespace Database\Seeders;

use App\Models\Escuela;
use Illuminate\Database\Seeder;

class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuela::create([
            'nombre' => 'Nacional',
            'direccion' => 'Dirección 1',
            'logotipo' => '',
            'correo'=> 'correo1@correo.com',
            'telefono' => '',
            'pagina_web' => '',
        ]);

        Escuela::create([
            'nombre' => 'Escuela Mixta número 3',
            'direccion' => 'Dirección 2',
            'logotipo' => '',
            'correo'=> 'correo2@correo.com',
            'telefono' => '',
            'pagina_web' => '',
        ]);

        Escuela::create([
            'nombre' => 'Escuela San Carlos',
            'direccion' => 'Dirección 3',
            'logotipo' => '',
            'correo'=> 'correo3@correo.com',
            'telefono' => '',
            'pagina_web' => '',
        ]);

        Escuela::create([
            'nombre' => 'Escuela Normal Nacional',
            'direccion' => 'Dirección 4',
            'logotipo' => '',
            'correo'=> 'correo4@correo.com',
            'telefono' => '',
            'pagina_web' => '',
        ]);

        Escuela::create([
            'nombre' => 'Escuela San Vicente',
            'direccion' => 'Dirección 5',
            'logotipo' => '',
            'correo'=> 'correo5@correo.com',
            'telefono' => '',
            'pagina_web' => '',
        ]);

        Escuela::create([
            'nombre' => 'Escuela del Distrito 3',
            'direccion' => 'Dirección 6',
            'logotipo' => '',
            'correo'=> 'correo6@correo.com',
            'telefono' => '',
            'pagina_web' => '',
        ]);
    }
}
