<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtener listado de marcas
        // $marcas = Marca::all();
        // $marcas = Marca::simplePaginate(5); //lo que hace es que acota a 5 registros solamente pero solo muestra previos y next

        $marcas = Marca::paginate(5);
        
        //retornamos vista pasando datos
        return view('/adminMarcas', ['marcas' => $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/agregarMarca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mkNombre = $request->mkNombre;
        
        //primero hacer una validacion
        $this->validar($request);

        //segundo se hace una instanciacion
        $Marca = new Marca();
        
        //tercero una asignacion
        $Marca->mkNombre = $mkNombre;

        //cuarta un guardado
        $Marca->save();

        //redireccionamiento con mensaje ok
        return redirect('/adminMarcas')->with(['mensaje'=>'Marca: ' . $mkNombre . ' agregada correctamente']);
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
        //obtener datos de una marca
        $Marca = Marca::find($id);

        //retornamos vista del form con los datos cargados
        return view('modificarMarca', ['Marca'=>$Marca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //leer el dato primero
        $mkNombre = $request->mkNombre;

        //Validacion
        $this->validar($request);

        //Obtener datos de una marca
        $Marca = Marca::find($request->idMarca);

        // asingamos
        $Marca->mkNombre = $mkNombre;

        // guardamos 
        $Marca->save();

        // redireccionamos
        return redirect('/adminMarcas')->with(['mensaje'=>'Marca: ' . $mkNombre . ' se ha modificado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     * Funcion para validacion y envio de mensaje cuando es requerido
     *
     * @param    type  $request Description
     *
     * @return      type
     *
     */
    private function validar($request) {
        $request->validate(
            [
                'mkNombre'=>'required | min:2 | max:30'
            ],
            [
                'mkNombre.required' => 'El campo Nombre de la marca, es obligatorio',
                'mkNombre.min' => 'El Nombre de la marca debe tener al menos 2 caracteres',
                'mkNombre.max' => 'El Nombre de la marca debe tener por mucho 30 caracteres',
                'mkNombre.unique' => 'El Nombre de la marca debe ser unico'
            ]
        );
        
    }
}