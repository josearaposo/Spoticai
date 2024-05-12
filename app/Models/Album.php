<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albumes';

    public function temas()
    {
        return $this->belongsToMany(Tema::class, 'albumes_temas');
    }

    public function total()
    {

        $duracionTotal = 0;
        foreach ($this->temas as $tema){
            $duracionTotal += $tema->duracion;
        }
        // Calcula los minutos y segundos
        $minutos = floor($duracionTotal / 60);
        $segundos = $duracionTotal % 60;

        // Formatea la duración en el formato deseado
        $duracionFormateada = sprintf('%02d:%02d', $minutos, $segundos);

        return $duracionFormateada;
    }
}
