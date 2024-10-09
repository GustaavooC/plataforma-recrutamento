<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    // Adicionando a propriedade fillable
    protected $fillable = [
        'file_path', // Permitir atribuição em massa para o caminho do arquivo
        'score', 
        'user_id'    // Caso queira armazenar a pontuação da análise
    ];
}