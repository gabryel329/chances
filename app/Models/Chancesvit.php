<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chancesvit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chancesvit'; // Nome da sua tabela

    protected $fillable = [
        'campeao',
        'libertadores',
        'sulamericana',
        'rebaixamento',
        'previsao',
        'posicao'
    ];

    protected $dates = ['deleted_at']; // Para trabalhar com soft deletes

    public $timestamps = true; // Preenchimento automático de timestamps
}
