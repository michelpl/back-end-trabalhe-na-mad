<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        "nome"
        ,"data_fabricacao"
        ,"tamanho"
        ,"largura"
        ,"peso"
    ];
    
    public function categorias(){
        return $this->belongsToMany("App\Categoria", "produtos_categorias");
    }
    
    public function getCategoriaListAttribute() {
        $categorias = $this->categorias()->lists('nome')->all();
        return implode(", ", $categorias);
    }
}
