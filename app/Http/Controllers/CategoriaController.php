<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CategoriaController extends Controller
{
    public function listaCategoria()
    {
        $categorias = Categoria::all();
        if(!$categorias){
            return response()->json(['message' => 'Você ainda não cadastrou nenhuma categoria'], 500);
        }else{
            return response()->json($categorias, 200);
        }

    }

    public function editarCategoria(Request $request)
    {
        $categoria = Categoria::find($request->id);

        $categoria->descricao = $request->descricao;
        $categoria->save();
        return response()->json(['message' => 'Categoria atualizada com sucesso', 'categoria' => $categoria ], 200);
    }

    public function deletarCategoria(Request $request)
    {
        $categoria = Categoria::find($request->id);
        $categoria->delete();
        return response()->json(['message' => 'Categoria deletada com sucesso'], 200);
    }

    public function adicionarCategoria(Request $request)
    {
        $categoria = new Categoria();
        $categoria->descricao = $request->descricao;
        $categoria->save();
        return response()->json(['message' => 'Categoria adicionada com sucesso', 'categoria' => $categoria ], 200);
    }

    public function listaTransacoesCategoria()
    {
        return  $categoria = Categoria::with('transacoes')->whereHas('transacoes')->get();
    }
}
