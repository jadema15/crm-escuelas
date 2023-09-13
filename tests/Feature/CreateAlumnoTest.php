<?php

namespace Tests\Feature;

use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAlumnoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

   /*  public function test_an_alumno_can_be_created(){
        //Arrange
        $alumnoCreate = [
            'nombre' => 'x',
            'apellido'=>'y',
            'escuela_id'=>1,
            'fecha_nacimiento'=>'2000-01-01', 
            'ciudad_natal'=>'xx' 
        ];

        //Act
        $response = $this->post('/alumnos', $alumnoCreate);

       // $response->assertStatus(302);
        $this->assertDatabaseHas('alumnos', $alumnoCreate);
    } */
}
