<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Requests\StorePokemonPost;
use App\Http\Requests\UpdatePokemonPost;

class PokemonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        
        $pokemons = Pokemon::where('active', true)->paginate(6);

        $response = [
            'pagination' => [
                'total' => $pokemons->total(),
                'per_page' => $pokemons->perPage(),
                'current_page' => $pokemons->currentPage(),
                'last_page' => $pokemons->lastPage(),
                'from' => $pokemons->firstItem(),
                'to' => $pokemons->lastItem()
                ],
            'data' => $pokemons,
        ];
        
        return response()->json($response, 200);
    
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
    public function store(StorePokemonPost $request) {

        $imagen = $request->file("picture");
        $nombre = time() . $imagen->getClientOriginalName();
        $dir = public_path().'/img/';
        $subir = $imagen->move($dir, $nombre);
        Pokemon::create([
            'name' => $request['name'],
            'picture' => $nombre,
            'class' => $request['class'],
            'level' => $request['level']
        ]);
        return response()->json(['message' => 'Se agrego el socio con exito'], 200);
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
    public function update(UpdatePokemonPost $request, Pokemon $pokemon) {

        if($request->hasFile('picture')){

            $imagen = $request->file("picture");
            $nombre = time() . $imagen->getClientOriginalName();
            $dir = public_path().'/img/';
            $subir = $imagen->move($dir, $nombre);
            $pokemon->update([
                'name' => $request['name'],
                'picture' => $nombre,   
                'class' => $request['class'],
                'level' => $request['level']
            ]);
        
        } else {
                
            $pokemon->update([
                'name' => $request['name'],
                'picture' => $request['picture'],
                'class' => $request['class'],
                'level' => $request['level']
            ]);
        }
            
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

    public function search(Request $request) {

        $pokemons = [];
        
        $parametro = $request['value'];
        
        if(trim($parametro) != ''){
            $pokemons =  Pokemon::search($parametro);
        }

        return response()->json(['pokemons' => $pokemons], 200);
    }
}
