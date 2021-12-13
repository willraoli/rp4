<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submissao extends Model{
         public $table = "submissao";

        protected $fillable = [
            'finalizado',
            'autor_id',
            'revista_id',
            'artigo_id',
            'data_submissao',  
        ];

        public function autor(){
            return $this->hasOne(Autor::class, 'orcid', 'autor_id');
        }

        public function revista(){
            return $this->hasOne(Revista::class, 'id', 'revista_id');
        }


        public function artigos(){
            return $this->belongsToMany(ArtigoFinal::class, 'submissaoartigo', 'submissao_id', 'artigo_id');
        }

    }
    
?>