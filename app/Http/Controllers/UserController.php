<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = User::paginate(6);
        
        foreach ($users as $user) {
            $user->rol;
        }
        
        $response = [
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
                ],
            'data' => $users,
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $picture = $request->file("picture");
        $name = time() . $picture->getClientOriginalName();
        $dir = public_path().'/img/';
        $upload = $picture->move($dir, $name);
        
        User::create([
            'name' => $request['name'],
            'picture' => $name,
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'rol_id' => $request['rol_id']
        ]);

        return response()->json(['message' => 'Se agrego el socio con exito'], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $dir = public_path() . '/img/' . $user->picture;
        unlink($dir);
        $user->delete();
    }

    public function search(Request $request) {
        
        $value = $request['value'];
        $value = '%'.$value.'%';

        $users = User::where('name', 'like', $value)->get();
        
        foreach ($users as $user) {
            $user->rol;
        }
        
        return response()->json(['users' => $users], 200);
    }
}