<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use App\Contracts\iTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $escuelas =  Escuela::paginate(5);
        return view('escuela/index', compact('escuelas', $escuelas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escuela/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $escuela = new Escuela();
        $messages = [
            'direccion_web.url' => 'La dirección web no es válida.',
        ];     

         $validar = Validator::make($request->all(), [
            'nombre' => 'required',
            'direccion' => 'required',
            'correo'    => 'required|email|unique:Escuelas',          
            'logotipo' => 'image|max:2048',
            'pagina_web' => 'nullable|url'
        ], $messages);    

         if ($validar->fails()) {
            return redirect()
                ->route('escuelas.create') 
                ->withErrors($validar)
                ->withInput();
        } 
        $escuela->nombre  = $request->nombre;
        $escuela->direccion = $request->direccion;
        $escuela->logotipo = $request->logotipo;
        $escuela->correo  = $request->correo;
        $escuela->telefono = $request->telefono;
        $escuela->pagina_web = $request->pagina_web;     

        if ($request->hasFile('logotipo')) {
            $logotipo = $request->file('logotipo');
            $logotipoNombre = $logotipo->getClientOriginalName();
            $logotipo->move(public_path('store/logos'), $logotipoNombre);
            $escuela->logotipo = $logotipoNombre;
        } 
      
        try {
            $escuela->save();
        return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente');
        } catch (\Throwable $th) {
            return redirect()->route('escuelas.index')->with('error', 'Error al registrar');
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
        return Escuela::find($id);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $escuela = Escuela::find($id);
        return view('escuela/edit', compact('escuela',$escuela));
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
        $escuela = Escuela::find($id);
        $validar = Validator::make($request->all(), [
            'nombre' => 'required',
            'direccion' => 'required',
            'correo'    => 'required|email|unique:Escuela'
        ]);    
        $escuela->nombre  = $request->nombre;
        $escuela->direccion = $request->direccion;
        $escuela->logotipo = $request->logotipo;
        $escuela->correo  = $request->correo;
        $escuela->telefono = $request->telefono;
        $escuela->pagina_web = $request->pagina_web;      

        if ($request->hasFile('logotipo')) {
            $logotipo = $request->file('logotipo');
            $logotipoNombre = time() . '.' . $logotipo->getClientOriginalExtension();
            $logotipo->move(public_path('store/logos'), $logotipoNombre);
            $escuela->logotipo = $logotipoNombre;
        }
      
        try {
            $escuela->save();
        return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente');
        } catch (\Throwable $th) {
            return redirect()->route('escuelas.index')->with('error', 'Error al registrar');
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
        $escuela = Escuela::find($id);
        if ($escuela) {
            try {
                $escuela->delete();
                return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente');
            } catch (\Throwable $th) {
                return redirect()->route('escuelas.index')->with('error', 'No se puede eliminar la escuela:' . $escuela->nombre .'  porque tiene alumnos registrados ');
            }           
        }
        return redirect()->route('escuelas.index')->with('error', 'No se encontró la escuela');
    }
    

    public function listadoEscuelas()
    {
      return  Escuela::all();
    }

    public function generateHtml(iTemplate $template)   {            
        $html = $template->getHtml('hola a todos desde la interfaz');
        return $html;     
    }
    
}
