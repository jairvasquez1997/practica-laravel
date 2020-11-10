<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function create(){
        return view ('entries.create');
    }

    public function edit(Entry $entry){
        return view ('entries.edit', compact('entry'));
    }

    public function store(Request $request){
        //dd($request->all());
        $validatedData = $request->validate([
            'titulo' => 'required|min:7|max:255',
            'contenido' => 'required|min:25|max:3000'
        ]);

        $entry = new Entry();
        $entry->titulo = $validatedData['titulo'];
        $entry->contenido = $validatedData['contenido'];
        $entry->user_id = auth()->id();
        $entry->save();//INSERT INTO

        $status = 'Tu publicación ha sido publicada correctamente.';
        return back()->with(compact('status'));
    }

    public function update(Request $request, Entry $entry){
        //dd($request->all());
        $validatedData = $request->validate([
            'titulo' => 'required|min:7|max:255',
            'contenido' => 'required|min:25|max:3000'
        ]);

        //Todo: allow edit action only for author
        //auth()->id() === $entry->user_id
        $entry->titulo = $validatedData['titulo'];
        $entry->contenido = $validatedData['contenido'];        
        $entry->save();//INSERT INTO

        $status = 'Tu publicación ha sido actualizada correctamente.';
        return back()->with(compact('status'));
    }
}
