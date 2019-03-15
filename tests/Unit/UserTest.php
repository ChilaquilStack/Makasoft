<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase {

    /**
     * A basic test example.
     *
     * @test
     */

    public function get_all_users_test() {

        $user = factory(User::class)->create();

        $this
        ->actingAs($user)
        ->get(route('users.index'))
        ->assertStatus(200);

    }

    /**
     * delete
     * @test
    */

    public function remove_user_test(){

        $user =  factory(User::class)->create();

        $this
        ->actingAs($user)
        ->json('DELETE', route('users.destroy', ['user' => $user]))
        ->assertStatus(200);

    }

    /**
     * update
     * @test
    */

    public function update_user_test() {

        $data = [
            'name' => 'Jose Lopez Chabelo',
            'email' => str_random(5).'@gmail.com',
            'password' => "123",
            'rol_id' => 2
        ];

        $user = factory(User::class)->create();

        $this
        ->actingAs($user)
        ->json('POST', route('users.update', ['user' => $user]), $data)
        ->assertStatus(200);

    }

    /**
     * search
     * @test
    */

    public function search_user_test() {

        $valueToSearh = 'admin';

        $user = factory(User::class)->create();

        $this
        ->actingAs($user)
        ->json('POST', route('users.search'), ['value' => $valueToSearh])
        ->assertStatus(200);

    }

}