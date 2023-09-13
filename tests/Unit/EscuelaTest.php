<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Escuela;

class EscuelaTest extends TestCase
{
    private $escuela;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function listadoEscuelas_when_lista_empty(){
        $escuela = new Escuela();
        $this->assert(5,5);
    }
}
