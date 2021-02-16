<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoa';

    public $timestamps = false;

    protected $fillable = [
        'nome', 'nascimento', 'genero','pais_id'
    ];
}
