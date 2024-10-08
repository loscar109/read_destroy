<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];


    /*Una Marca pertenece a muchos modelos
    
        La marca Ford Tiene como modelo a varios pudiendo ser:
            Eco sport
            Fiesta
            Ka
            Ranger
            etc
            Se usa HasMany
            observar que esta tabla no tiene ninguna dependencia de otra, es decir no hay llave foranea
    
    */
    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }

}
