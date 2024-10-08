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

        // Guardar en la base de datos
        $vehiculo->save();
        return redirect()->route('vehiculos.index');
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
        // Validar los datos enviados (esto ya se maneja con el Form Request `UpdateVehiculoRequest`)
        
        // Actualizar los datos del vehículo con los valores del formulario
        $vehiculo->update([
            'patente' => $request->input('patente'),
            'chasis' => $request->input('chasis'),
            'modelo_id' => $request->input('modelo_id'),
        ]);
    
        // Redireccionar a la vista principal de vehículos con un mensaje de éxito
        return redirect()->route('vehiculos.index');
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
        return redirect()->route('vehiculos.index');
    }
}
