<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtigoFinal extends Model{
        public $table = "artigos";    

        protected $fillable = [
            'situacao_id',
            'tituloArtigo',
            'caminhoArtigo',  
        ];

        public function autores(){
            return $this->belongsToMany(Autor::class, 'artigoautor', 'artigo_id', 'autor_id');
        }

        public function submissao(){
            return $this->belongsTo(Submissao::class);
        }

        public function situacao(){
            return $this->hasOne(Situacao::class, 'id', 'situacao_id');
        }

    }
?>