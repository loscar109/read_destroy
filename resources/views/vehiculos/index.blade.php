<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="..">
                Crear Vehículo +
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
 
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">                            
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">    
                                <tr>
                                    <th>Patente</th>
                                    <th>Chasis</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->patente }}</td>
                                    <td>{{ $vehiculo->chasis }}</td>
                                    <td>{{ $vehiculo->modelo->nombre }}</td>
                                    <td>{{ $vehiculo->modelo->marca->nombre }}</td>
                                    <td>
                                        <button onclick="confirmDelete({{ $vehiculo->id }})" class="bg-red-500 text-white p-2 rounded">
                                            Eliminar
                                        </button> 
                                        <button class="bg-blue-500 text-white p-2 rounded">
                                            Editar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="deletePopup" style="display:none; position:fixed; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); justify-content:center; align-items:center;">
        <div style="background-color:gray; padding:20px; border-radius:10px; text-align:center;">
            <p>¿Estás seguro de que deseas eliminar este vehículo?</p>

            <!-- Formulario para eliminar -->
            <form id="deleteForm" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white p-2 rounded">Eliminar</button>
            </form>

            <button onclick="closePopup()" class="bg-gray-500 text-white p-2 rounded">Cancelar</button>
        </div>
    </div>

    <script>
        function confirmDelete(vehiculoId) {
            // Establece la acción del formulario al ID del vehículo
            var form = document.getElementById('deleteForm');
            form.action = `/vehiculos/${vehiculoId}`;  // Ruta correcta para eliminar el vehículo

            // Muestra el popup
            document.getElementById('deletePopup').style.display = 'flex';
        }

        function closePopup() {
            // Oculta el popup
            document.getElementById('deletePopup').style.display = 'none';
        }
    </script>

</x-app-layout>
