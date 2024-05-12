<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemaRequest;
use App\Http\Requests\UpdateTemaRequest;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
   {
       return view('temas.index', [
           'temas' => Tema::all(),
       ]);
   }


   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('temas.create', [
        'artistas' => Artista::all(),
        'albumes' => Album::all(),
    ]);
   }


   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $validated = $request->validate([
           'nombre' => 'required|max:255',
            'anyo' => 'required|max:4',
            'duracion' => 'required|integer',

       ]);


       $tema = new Tema();
       $tema->nombre = $validated['nombre'];
       $tema->anyo = $validated['anyo'];
       $tema->duracion = $validated['duracion'];
       $tema->save();
       $tema->albumes()->attach($request->album_id);
       $tema->artistas()->attach($request->artista_id);
       session()->flash('success', 'El tema se ha creado correctamente.');
       return redirect()->route('temas.index');
   }


   /**
    * Display the specified resource.
    */
   public function show(Tema $tema)
   {
       //
   }


   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Tema $tema)
   {
       return view('temas.edit', [
           'tema' => $tema,
       ]);
   }


   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Tema $tema)
   {
    $validated = $request->validate([
        'nombre' => 'required|max:255',
         'anyo' => 'required|max:4',
         'duracion' => 'required|integer',

    ]);

    $tema->nombre = $validated['nombre'];
    $tema->anyo = $validated['anyo'];
    $tema->duracion = $validated['duracion'];
    $tema->save();
    session()->flash('success', 'El tema se ha modificado correctamente.');
    return redirect()->route('temas.index');
   }


   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Tema $tema)
   {
       $tema->delete();
       return redirect()->route('temas.index');
   }


}
