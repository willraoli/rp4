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
        'password',
        'telefone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
