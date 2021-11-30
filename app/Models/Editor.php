<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Editor extends Authenticatable
{
    use HasFactory, HasRoles, Authorizable;


    protected $fillable = [
        // 'user_id',
        'nome',
        'email',
        'telefone',
        'endereco',
        'pais_id',
        'area_id',
        'dataContratacao',
        'dataDemissao',
    ];

    public function revista()
    {
        return $this->belongsTo(Revista::class);
    }

    public function pais()
    {
        return $this->hasOne(Pais::class, 'id', 'pais_id');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'area_id');
    }
    // public function user()
    // {
    //     return $this->hasOne(User::class, 'id', 'user_id');
    // }
}
