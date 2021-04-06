@extends('layouts.plantilla')

    @section('contenido')

        <h1>Panel de administración de pdoructos</h1>


        {{-- helper session para uarda mensaje para mostrar el alta fue correcta o la modificacion fue correcta o la eliminacion fue correcta --}}
        @if ( session('mensaje') )
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Presentacion</th>
                    <th>Imagen</th>
                    <th colspan="2">
                        <a href="/agregarProducto" class="btn btn-outline-secondary">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->prdNombre }}</td>
                        <td>{{ $producto->relMarca->mkNombre }}</td>
                        <td>{{ $producto->relCategoria->catNombre }}</td>
                        <td>${{ $producto->prdPrecio }}</td>
                        <td>{{ $producto->prdPresentacion }}</td>
                        <td><img src="{{ asset('productos/') . '/' . $producto->prdImagen }}" alt="imagen{{ $producto->prdImagen }}" class="img-thumbnail"></td>                        
                        <td>
                            <a href="/modificarProducto/{{$producto->idProducto}}" class="btn btn-outline-secondary">
                                Modificar
                            </a>
                        </td>
                        <td>
                            <a href="/eliminarProducto/{{$producto->idProducto}}" class="btn btn-outline-secondary">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $productos->links()}}
        <br>

    @endsection
