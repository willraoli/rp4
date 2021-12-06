<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    use HasFactory;

    public $table = "autors";
    
    protected $fillable = [
        'user_id',
        'orcid'
    ];

    public function artigo(){
        return $this->belongsToMany(ArtigoFinal::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
