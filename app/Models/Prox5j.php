<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prox5j extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'prox5j'; // Nome da sua tabela

    protected $fillable = [
        'timecasa',
        'timefora',
        'vitoria',
        'empate',
        'derrota',
    ];

    protected $dates = ['deleted_at']; // Para trabalhar com soft deletes

    public $timestamps = true; // Preenchimento automático de timestamps
}
