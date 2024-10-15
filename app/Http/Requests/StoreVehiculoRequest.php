<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehiculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'patente'        => 'required|string|max:255|unique:vehiculos',
            'chasis'         => 'required|string|max:255|unique:vehiculos',
            'modelo_id'      => 'required',
            
            
        ];
    }

    public function messages()
    {
        return [
            'patente.required' =>  'La patente es requerida para dar de alta un vehiculo',
            'patente.string'   =>  'La patente debe contener numeros y letras',
            'patente.unique:vehiculos' => 'La patente debe ser única'


        ];
    } 
}
