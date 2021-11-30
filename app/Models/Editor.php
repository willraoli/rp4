<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
        'pais_id',
        'area_id',
        'dataContratacao',
        'dataDemissao',
     ];

     public function revista(){
        return $this->belongsTo(Revista::class);
    }

    public function pais(){
        return $this->hasOne(Pais::class, 'id', 'pais_id');
    }

    public function area(){
        return $this->hasOne(Area::class, 'id', 'area_id');
    }

}
