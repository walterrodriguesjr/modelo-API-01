<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{
    use HasFactory;
    protected $fillable = [
        'trabalho',
    ];

    public function pessoa()
    {
        return $this->hasMany(Pessoa::class);
    }

}


