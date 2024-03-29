<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    public $timestamps = false;

    public function users() {
        return $this->hasMany('App\User');
    }

    public function scopeSearch($query, $value) {
        $value = '%'.$value.'%';
        return $query->where('name', 'like', $value)->get();
    }

}