<?php

use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $rols = [
            ['name' => 'user'],
            ['name' => 'admin'],
            ['name' => 'seller']
        ];
            
        DB::table('rols')->insert($rols);


    }
}
