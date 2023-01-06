<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Profissao;
use Illuminate\Http\Request;

class ProfissaoController extends Controller
{
    public function pessoa($id)
    {
        $profissao = Profissao::find($id);
        /* dd($profissao); */
         $pessoa = $profissao->pessoa()->get(); 
         return $pessoa;
        /*  dd($pessoa);
         return response()->json([
            'profissao' => $profissao,
            'pessoa' => $pessoa,
         ]); */

    }
}
