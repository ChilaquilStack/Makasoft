<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        
        $pokemons = Pokemon::All();
        
        return response()->json(["pokemons" => $pokemons], 200);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $pokemon =  $request->input('pokemon');
        
        $newPokemon = Pokemon::create($pokemon);
        
        return response()->json($newPokemon, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon) {

        return response()->json(['pokemon' => $pokemon], 202);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon) {


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon) {

        $data = $request->input('pokemon');
        
        $pokemon->update($data);

        //$pokemon->save();
        
        return response()->json(['pokemon' => $pokemon], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon) {
        $pokemon->active = false;
        $pokemon->save();
        return response()->json($pokemon,200);
    }
}
