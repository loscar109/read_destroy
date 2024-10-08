<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Vehículo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Formulario para editar el vehículo -->
                    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="patente_vehiculo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Patente</label>
                        <input id="patente_vehiculo" type="text" name="patente" value="{{ old('patente', $vehiculo->patente) }}" required autofocus
                            class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border
                            border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400
                            dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                            dark:text-gray-100 sm:text-sm"
                        >

                        <label for="chasis_vehiculo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Chasis</label>
                        <input id="chasis_vehiculo" type="text" name="chasis" value="{{ old('chasis', $vehiculo->chasis) }}" required autofocus
                            class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border
                            border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400
                            dark:placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                            dark:text-gray-100 sm:text-sm"
                        >

                        <label for="select_opcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Modelo</label>
                        <select id="select_opcion" name="modelo_id"
                            class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:text-gray-100 sm:text-sm"
                        >
                            @foreach ($modelos as $modelo)
                                <option value="{{ $modelo->id }}" {{ $vehiculo->modelo_id == $modelo->id ? 'selected' : '' }}>
                                    {{ $modelo->mostrarDatosMarca() }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Botones de guardar y volver -->
                        <div class="mt-6 flex justify-between">
                            <button type="submit" class="bg-green-500 text-white p-2 rounded">
                                Guardar
                            </button>

                            <!-- Botón de Volver -->
                            <a href="{{ route('vehiculos.index') }}" class="bg-gray-500 text-white p-2 rounded">
                                Volver
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
