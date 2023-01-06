<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePessoaFormRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PessoaController extends Controller
{

    
    public function index()
    {
        $pessoa = Pessoa::all();
        return $pessoa;
    }
    
    public function filter(Request $request)
    {
        $pessoa = Pessoa::where('profissao_id', 'LIKE', "%{$request->profissao_id}%")
                        ->where('nome', 'LIKE', "%{$request->nome}%")
                        ->where('pais', 'LIKE', "%{$request->pais}%")->get();
        return $pessoa;
    }
    
    public function create()
    {
        
    }

    public function store(StoreUpdatePessoaFormRequest $request)
    {
        $pessoa = Pessoa::create([
            'profissao_id' => $request->profissao_id,
            'nome' => $request->nome,
            'pais' => $request->pais,
            'image' => $request->image,
        ]);
        if($request->image){
            //CAPTURA E PERSONALIZA O NOME DO ARQUIVO,COM NOME DO TITLE E O TIPO DE ARQUIVO
            $nameFile = Str::of($request->nome)->slug('-') . '.' .$request->image->getClientOriginalExtension();
            $image = $request->image->storeAs('pessoas', $nameFile);
            $pessoa['image'] = $image;
        }
        $pessoa->save();
        return $pessoa;
    }

    public function show($id)
    {
        $pessoa = Pessoa::find($id);
        return $pessoa;
    }

    public function update(StoreUpdatePessoaFormRequest $request, $id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->update([
            'profissao_id' => $request->profissao_id,
            'nome' => $request->nome,
            'pais' => $request->pais,
            'image' => $request->image,
        ]);

        if($request->image){
            if (Storage::exists($pessoa->image)) {
                Storage::delete($pessoa->image);
           
            }

            //CAPTURA E PERSONALIZA O NOME DO ARQUIVO,COM NOME DO TITLE E O TIPO DE ARQUIVO
            $nameFile = Str::of($request->nome)->slug('-') . '.' .$request->image->getClientOriginalExtension();
            
            $image = $request->image->storeAs('pessoas', $nameFile);
            $pessoa['image'] = $image;
        }

        $pessoa->update();
        return $pessoa;
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);

        if (Storage::exists($pessoa->image)) {
            Storage::delete($pessoa->image);
        }

        $pessoa->delete();
        return $pessoa;
    }
}
