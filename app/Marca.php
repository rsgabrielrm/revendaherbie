<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nome'];
    
    public function getModeloAttribute($value) {
        return strtoupper($value);
    }
    public $timestamps = false; 
}
