<?php

namespace lara3;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table      = "categoria";
    protected $primarykey = "idCategoria";

    public $timestamps = false;
    protected $filable = [
        'nomeCategoria',
        'descricao',
        'condicao'
    ];
    protected $guarded[];
}
