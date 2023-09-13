<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Contracts\iEdad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller  implements iEdad
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::with('escuela')->paginate(5);
        return view('alumno/index', compact('alumnos', $alumnos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumno/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $alumno = new Alumno();

        $validar = Validator::make($request->all(), [

            'nombre' => 'required|unique:Alumnos',
            'apellido' => 'required',
            'escuela_id'    => 'required',
            'fecha_nacimiento'    => 'required'        
        ]);     

        if ($validar->fails()) {
            return redirect()
                ->route('alumnos.create') 
                ->withErrors($validar)
                ->withInput();
        }

        $alumno->nombre  = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->escuela_id = $request->escuela_id;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->ciudad_natal = $request->ciudad_natal;    
      
        try {
            $alumno->save();
        return redirect()->route('alumnos.index')->with('success', 'Alumno registrado con éxito');
        } catch (\Throwable $th) {
          //  dd($th);
            return redirect()->route('alumnos.index')->with('error', 'Error al registrar');
        }      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        $edad = self::calcularEdad($alumno->fecha_nacimiento);
        return view('alumno/edit', compact('alumno',$alumno, 'edad', $edad));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);
        $validar = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'escuela_id'    => 'required',
            'fecha_nacimiento'    => 'required',
        ]);   

        $alumno->nombre  = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->escuela_id = $request->escuela_id;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->ciudad_natal = $request->ciudad_natal;    
      
        try {
            $alumno->save();
        return redirect()->route('alumnos.index')->with('success', 'Alumno registrado con éxito');
        } catch (\Throwable $th) {
           return redirect()->route('alumnos.index')->with('error', 'Error al registrar');
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        if ($alumno) {
            $alumno->delete();
            return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente');
        } else {
            return redirect()->route('alumnos.index')->with('error', 'No se encontró la alumno');
        }
    }

    public function calcularEdad($fechaNacimiento)    {      
        $fecha = Carbon::parse($fechaNacimiento); 
        return $fecha->age;
    }

}
