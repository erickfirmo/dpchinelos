<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{   
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'unidades',
        'preco',
        'imagem_principal',
        'imagem_2',
        'imagem_3',
        'categoria_id',
        'status_id'
    ];
    
    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
