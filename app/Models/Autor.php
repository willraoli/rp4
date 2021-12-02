<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    use HasFactory;

    public $table = "autors";
    
    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'telefone'
    ];

    public function artigo(){
        return $this->belongsToMany(ArtigoFinal::class);
    }
}
