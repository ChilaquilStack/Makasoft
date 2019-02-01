<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model {
    protected $table = 'pokemons';
    protected $primaryKey = 'id';
    protected $fillable = ['name','level','class','picture','active'];
    public function scopeSearch($query, $parametro){
        $busqueda = '%' . $parametro . '%';
        if(trim($parametro) != ''){
	    	return $query->where([['name','like', $busqueda],['active','=',true]])
	    	->orWhere([['level','=', $parametro],['active',true]])
	    	->orWhere([['class','like', $busqueda],['active',true]])
	    	->get();
    	}
    }
}
