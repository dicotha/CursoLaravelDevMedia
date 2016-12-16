<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable = ['nome','email','endereço'];
    //
    public function telefones(){
    	return $this->hasMany('App\Telefone');
    }

    public function addtelefone(Telefone $tel){
    	return $this->telefones()->save($tel);
    }
    public function deletarTelefones(){
    	foreach ($this->telefones as $tel) {
    		$tel->delete();
    	}
    	return true;
    }
}
