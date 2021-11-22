<?php

use Illuminate\Database\Eloquent\Model;

class Periodicidade extends Model{

        protected $fillable = [
            'descricaoPeriodicidade',  
        ];


        public function revista(){
            return $this->belongsTo(Revista::class);
        }
    

    }


?>