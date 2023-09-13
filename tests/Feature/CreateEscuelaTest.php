<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateEscuelaTest extends TestCase
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

 /*    public function test_an_escuela_can_be_created(){

        $file = UploadedFile::fake()->image('logo.jpg', 2049); // Crea un archivo de 2049 KB (un poco más de 2 MB).

        //Arrange
        $escuelaCreate = [
            'nombre' =>"x",
            'direccion'=>"x",
            'logotipo'=>"x",
            'correo'=>"hola@hola.com", 
            'telefono'=>"xx", 
            'pagina_web'=>"http://www.sss.com" 
        ];

        //Act
        $response = $this->post('/escuelas', $escuelaCreate);
        $response->assertStatus(302);
        $this->assertDatabaseHas('escuelas', $escuelaCreate);
    } */

    public function testImageUpload()
    {
        $file = UploadedFile::fake()->image('logo.jpg', 2048); 

        $escuelaCreate = [
            'nombre' => "x",
            'direccion' => "x",
            'logotipo' => $file,
            'correo' => "hola@hola.com",
            'telefono' => "xx",
            'pagina_web' => "http://www.sss.com"
        ];

        $response = $this->post('/escuelas', $escuelaCreate);
        $response->assertStatus(302);
        $fileName = $file->getClientOriginalName();  

        $directory = public_path('store/logos/' . $fileName);
        $this->assertTrue(file_exists($directory));
    }

    public function testUrl()
    {
        $file = UploadedFile::fake()->image('logo.jpg', 2048); 

        $escuelaCreate = [
            'nombre' => "",
            'direccion' => "x",
            'logotipo' => $file,
            'correo' => "hola@hola.com",
            'telefono' => "xx",
            'pagina_web' => "http://www.hola.com"
        ];

        $response = $this->post('/escuelas', $escuelaCreate);
        $response->assertStatus(302);
      //  $response->assertSessionHasErrors(['nombre', 'direccion', 'correo']);        
    }

}
