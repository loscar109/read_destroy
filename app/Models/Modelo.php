<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'marca_id'
    ];


    /*
    
        En este caso es de observar que esta clase tiene dos clases que asocian a la misma
        Un modelo tiene asociado a una marca, ocupamos belongsTo
        Un modelo puede pertenecer a muchos vehiculos, ocupamos hasMany

    */

      /*Un modelo pertenece a una marca*/
      public function marca()
      {
          return $this->belongsTo(Marca::class);
      } 
  
      /*Un Modelo se asocia a muchos vehiculos*/
      public function vehiculos()
      {
          return $this->hasMany(Vehiculo::class);
      }

      public function mostrarDatosMarca()
      {
        return $this->nombre . " - " . $this->marca->nombre;
      }
}
