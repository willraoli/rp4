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

    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'telefone',
        'area_pref',
        'pais_origem',
        'instituicao',
    ];

    public function pais(){
        return $this->hasOne(Pais::class, 'id', 'pais_origem');
    }
}
