<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propostas extends Model
{
	public function carro() {
        return $this->belongsTo('App\Carro');
    }
    protected $fillable = ['nome', 'carro_id', 'email', 'telefone', 'proposta'];
    public function getModeloAttribute($value) {
        return strtoupper($value);
    }
    public function setPropostaAttribute($value) {
        $novo1 = str_replace('.', '', $value);    // retira o ponto
        $novo2 = str_replace(',', '.', $novo1);   // substitui a , por .
        $this->attributes['proposta'] = $novo2;
    }
}
