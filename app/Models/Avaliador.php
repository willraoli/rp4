<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Avaliador extends Authenticatable
{
    use HasFactory, HasRoles, Authorizable;

    protected $fillable = [
        'nome',
        'endereco',
        'email',
        'telefone',
        'pais_origem',
        'area_pref',
        'user_id'
    ];

    public function pais()
    {
        return $this->hasOne(Pais::class, 'id', 'pais_origem');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'area_pref');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
