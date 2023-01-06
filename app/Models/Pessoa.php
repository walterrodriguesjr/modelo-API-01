<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'profissao_id',
        'nome',
        'pais',
        'image'
    ];

    public function profissao()
    {
        return $this->belongsTo(Profissao::class);
    }

}
