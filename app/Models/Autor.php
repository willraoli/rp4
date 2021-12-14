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

    protected $table = "autors";
    protected $primaryKey = 'orcid';

    protected $fillable = [
        'user_id',
        'orcid',
        'area_id',
        'instituicao'
    ];
  
    public function pais(){
        return $this->hasOne(Pais::class, 'id', 'pais_origem');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'area_id');
    }

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
