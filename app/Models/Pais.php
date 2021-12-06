<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nomePais',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
