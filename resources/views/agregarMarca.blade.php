<x-app-layout>    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Marca
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Alta de una nueva marca</h1>

                <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

                    <form action="/agregarMarca" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="mkNombre">Nombre de la marca</label>
                            <input type="text" name="mkNombre"
                                    value="{{old('mkNombre')}}"
                                    class="form-control" id="mkNombre">
                        </div>
                        <button class="btn btn-dark mr-3">Agregar marca</button>
                        <a href="/adminMarcas" class="btn btn-outline-secondary">
                            Volver a panel
                        </a>
                    </form>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger col-8 mx-auto">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
