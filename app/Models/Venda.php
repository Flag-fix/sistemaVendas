<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable=[
        'qtd',
        'data-venda',
        'vendedor_id',
        'produto_id',
    ];


    public function vendedor(){

        return $this->belongsTo(Vendedor::class, 'vendedor_id');

    }

    public function produto(){

        return $this->belongsTo(Produto::class, 'produto_id');

    }

}
