<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <!-- Encabezado opcional -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('vehiculos.store') }}" method="POST">
                        @csrf
                    <label for="patente_vehiculo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Patente</label>
                    <input id="patente_vehiculo" type="text" name="patente" value="{{ old('patente') }}" required autofocus
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border
                        border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400
                        dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                        dark:text-gray-100 sm:text-sm"
                    >

                    <label for="chasis_vehiculo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Chasis</label>
                    <input id="chasis_vehiculo" type="text" name="chasis" value="{{ old('chasis') }}" required autofocus
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border
                        border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400
                        dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                        dark:text-gray-100 sm:text-sm"
                    >

                    <label for="select_opcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Selecciona una opción</label>
                    <select id="select_opcion" name="modelo_id"
                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm"
                    >
  
                        @foreach ($modelos as $modelo)
                            <option 
                                value="{{$modelo->id }}">
                                    {{$modelo->mostrarDatosMarca()}}
                            </option>
                        @endforeach   
                    </select>
                    <button type="submit">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
