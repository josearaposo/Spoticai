<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    public function albumes()
    {
        return $this->belongsToMany(Album::class, 'albumes_temas');
    }

    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artistas_temas');
    }

    public function intervalo()
    {
        $duracionSegundos = $this->duracion;

        // Calcula los minutos y segundos
        $minutos = floor($duracionSegundos / 60);
        $segundos = $duracionSegundos % 60;

        // Formatea la duración en el formato deseado
        $duracionFormateada = sprintf('%02d:%02d', $minutos, $segundos);

        return $duracionFormateada;
    }
}
