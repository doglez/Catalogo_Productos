<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(5);
        return view('/adminCategorias', ['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(('/agregarCategoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catNombre = $request->catNombre;

        $this->validar($request);

        $Categoria = new Categoria();

        $Categoria->catNombre = $catNombre;

        $Categoria->save();

        return redirect('/adminCategorias')->with(['mensaje' => 'Categoria: ' . $catNombre . ' agregada correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Categoria = Categoria::find($id);
        
        return view('/modificarCategoria', ['Categoria'=>$Categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $catNombre = $request->catNombre;

        $this->validar($request);

        $Categoria = Categoria::find($request->idCategoria);

        $Categoria->catNombre = $catNombre;

        $Categoria->save();

        return redirect('/adminCategorias')->with(['mensaje'=>'Categoria: ' . $catNombre . ' se ha modificado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
    /**
     *
     * Funcion para validacion y envio de mensajes cuando es requerido
     *
     * @param    type  $request Description
     *
     * @return      type
     *
     */
    private function validar($request) {
        $request->validate(
            [
                'catNombre' => 'required | min:3 | max:30'
            ],
            [
                'catNombre.required' => 'El campo nombre de categoria es obligatorio',
                'catNombre.min' => 'El nombre de la categoria debe tener al menos 2 carateres',
                'catNombre.max' => 'El nombre de la categoria debe tener por mucho 30 caracteres',
                'catNombre.unique' => 'El nombre de la categoria debe ser unico'
            ]
        );

    }
}
