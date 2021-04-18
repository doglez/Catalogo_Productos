<x-app-layout>    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Eliminar Marca
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Baja de una marca</h1>

                <div class="row alert bg-light border-danger col-8 mx-auto p-2">
                    <div class="col text-danger align-self-center">
                    <form action="/eliminarMarca" method="post">
                        @csrf
                        @method('delete')

                        <h2>Eliminar la marca: {{$Marca->mkNombre}}</h2>

                        <input type="hidden" name="idMarca"
                            value="{{$Marca->idMarca}}">
                        <input type="hidden" name="mkNombre"
                            value="{{$Marca->mkNombre}}">
                        <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                        <a href="/adminMarcas" class="btn btn-outline-secondary btn-block">
                            Volver a panel
                        </a>

                    </form>
                    </div>
                </form>

                <script>
                    Swal.fire(
                        'Advertencia',
                        'Estas seguro que deseas borrar la marca',
                        'warning'
                    )
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
