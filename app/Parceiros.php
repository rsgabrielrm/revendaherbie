<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiros extends Model
{
   protected $fillable = ['nome', 'email', 'telefone', 'cidade'];
}
