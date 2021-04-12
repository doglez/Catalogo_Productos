@extends('layouts.plantilla')

    @section('contenido')

        <h1>Baja de una categoria</h1>

        <div class="row alert bg-light border-danger col-8 mx-auto p-2">
            <div class="col text-danger align-self-center">
            <form action="/eliminarCategoria" method="post">
                @csrf
                @method('delete')

                <h2>Eliminar la categoria: {{$Categoria->catNombre}}</h2>

                <input type="hidden" name="idCategoria"
                       value="{{$Categoria->idCategoria}}">
                <input type="hidden" name="catNombre"
                       value="{{$Categoria->catNombre}}">
                <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                <a href="/adminCategorias" class="btn btn-outline-secondary btn-block">
                    Volver a panel
                </a>

            </form>
            </div>
        </form>

            <script>
                Swal.fire(
                    'Advertencia',
                    'Estas seguro que deseas borrar la Categoria',
                    'warning'
                )
            </script>


    @endsection
