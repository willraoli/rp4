<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model{
         public $table = "situacao";

        protected $fillable = [
            'descricaoSituacao',
        ];

        public function artigos(){
            return $this->belongsToMany(ArtigoFinal::class);
        }

    }
    
?>