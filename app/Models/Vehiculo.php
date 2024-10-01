<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'patente',
        'chasis',
        'modelo_id'
    ];

    /*
        La función es en singular ya que un vehiculo tiene asociado un modelo
        Se usa belongsTo

        Por ejemplo
        El vehiculo con patente ooh653 con chasis jasdjafa1235 tiene como modelo al Fiesta que este pertence a Ford como marca

    */

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    } 

    /*Creamos un metodo personalizado gracias a la consulta efectiva de tinker*/
    
    public function mostrarDatos()
    {
        return $this->patente . " - " . $this->modelo->nombre . " - " . $this->modelo->marca->nombre;
    }
}
