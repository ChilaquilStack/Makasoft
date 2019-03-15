<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPost;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = User::with('rol')->paginate(6);
        
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
    public function store(StoreUserPost $request) {

        $picture = $request->file("picture");
        $name = time() . $picture->getClientOriginalName();
        $dir = public_path().'/img/';
        $upload = $picture->move($dir, $name);
        
        User::create([
            'picture' => $name,
            'name' => $request['name'],
            'email' => $request['email'],
            'rol_id' => $request['rol_id'],
            'password' => $request['password']
        ]);

        return response()->json(['message' => 'user create', 'error' => false], 201);
        
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
    public function update(UpdateUserPost $request, User $user) {

        if($request->hasFile('picture')) {

            $picture = $request->file('picture');
            
            $name = time() . $picture->getClientOriginalName();
            
            $dir = public_path().'/img/';
            
            $upload = $picture->move($dir, $name);
            
            if($user->picture) {
                if (file_exists($dir . $user->picture))
                    unlink($dir . $user->picture);
            }
            
            $user->update([
                'name' => $request['name'],
                'picture' => $name,
                'email' => $request['email'],
                'rol_id' => $request['rol_id'],
                'password' => $user->password
            ]);

        } else {
            
            $user->update($request->all());

        }
        
        return response()->json(['message' => 'update user', 'error' => false], 200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        
        
        if($user->picture) {
            
            $dir = public_path() . '/img/' . $user->picture;
            
            if(file_exists($dir))
                unlink($dir);
        
        }
        
        $user->delete();
    
    }

    public function search(Request $request) {
        
        $value = $request['value'];
        
        $value = '%' . $value . '%';
        
        $users = User::filter($value);
        
        return response()->json($users, 200);
    
    }
}