<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;
use App\Models\Vehiculo;
use App\Models\Modelo;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
   
        return view('vehiculos.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $modelos = Modelo::all();
        return view('vehiculos.create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehiculoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehiculoRequest $request)
    {
        // Crear el nuevo vehículo
        $vehiculo = new Vehiculo();
        $vehiculo->patente = $request->input('patente');
        $vehiculo->chasis = $request->input('chasis');
        $vehiculo->modelo_id = $request->input('modelo_id'); // Asigna la relación con el modelo

        // Guardar la imagen si se sube
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vehiculos', 'public'); // Guardar en la carpeta storage/app/public/vehiculos
            $vehiculo->image = $imagePath;
        }

        // Guardar en la base de datos
        $vehiculo->save();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        $modelos = Modelo::all();
        return view('vehiculos.edit', compact('vehiculo','modelos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehiculoRequest  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehiculoRequest $request, Vehiculo $vehiculo)
    {
        // Verificar si se subió una nueva imagen
        if ($request->hasFile('image')) {
            // Guardar la nueva imagen en la carpeta 'vehiculos' en el almacenamiento público
            $imagePath = $request->file('image')->store('vehiculos', 'public');
    
            // Actualizar los datos del vehículo con la nueva imagen
            $vehiculo->update([
                'patente' => $request->input('patente'),
                'chasis' => $request->input('chasis'),
                'modelo_id' => $request->input('modelo_id'),
                'image' => $imagePath, // Actualizar el campo de imagen
            ]);
        } else {
            // Si no hay imagen, actualizar solo los demás campos
            $vehiculo->update([
                'patente' => $request->input('patente'),
                'chasis' => $request->input('chasis'),
                'modelo_id' => $request->input('modelo_id'),
            ]);
        }
    
        // Redireccionar a la vista principal de vehículos con un mensaje de éxito
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo editado correctamente.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        // Elimina el vehículo
        $vehiculo->delete();

        // Redirige a la vista 
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');

    }
}
