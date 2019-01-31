<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model {
    protected $table = 'pokemons';
    protected $primaryKey = 'id';
    protected $fillable = ['name','level','class','picture','active'];
    protected $attributes = [
        'name' => 'pokemon',
        'level' => 0,
        'class' => 'generico',
        'picture' => 'picture.jpg',
        'active' => true,
    ];
}
