<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Autor extends Authenticatable
{
    use HasFactory, HasRoles, Authorizable;

    public $table = "autors";
    
    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'telefone',
        'area_pref',
        'pais_origem',
        'instituicao',
        'user_id'
    ];
    public function pais(){
        return $this->hasOne(Pais::class, 'id', 'pais_origem');
    }

    public function artigo(){
        return $this->belongsToMany(ArtigoFinal::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
