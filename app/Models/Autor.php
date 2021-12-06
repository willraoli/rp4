<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    use HasFactory;

    protected $table = "autors";
    protected $primaryKey = 'orcid';

    protected $fillable = [
        'user_id',
        'orcid'
    ];

    public function submissao(){
        return $this->belongsToMany(Submissao::class);
    }

    public function artigo(){
        return $this->belongsToMany(ArtigoFinal::class);
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
