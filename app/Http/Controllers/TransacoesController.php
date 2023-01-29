<?php

namespace App\Http\Controllers;

use App\Models\Transacoes;
use Illuminate\Http\Request;

class TransacoesController extends Controller
{
    public function adicionarTransacao(Request $request)
    {
        //converter valor para decimal
        $request->merge([ 'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)) ]);


        $receita = Transacoes::create([
            'tipo' => $request->tipo,
            'id_categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'data' => $request->data,
            'valor' => $request->valor,
        ]);

        if($receita){
            return response()->json([
                'message' => 'Receita adicionada com sucesso!'
            ],200);
        }else{
            return response()->json([
                'message' => 'Erro ao adicionar receita!'
            ],500);
        }
    }

    public function calculaReceita()
    {
        $receitas = Transacoes::where('tipo', '1')->get();

        $total = 0.00;
        foreach($receitas as $receita){
            $total += (double)$receita->valor;
        }

        return response()->json([
            'total' => $total
        ],200);
    }

    public function calculaDespesa()
    {
        $despesas = Transacoes::where('tipo', "0")->get();
        $total = 0.00;
        foreach($despesas as $despesa){

            $total += (float)$despesa->valor;

        }



        return response()->json([
            'total' => $total
        ],200);
    }

    public function saldoAtual()
    {
        $receitas = Transacoes::where('tipo', '1')->get();
        $despesas = Transacoes::where('tipo', '0')->get();

        $totalReceita = 0;
        foreach($receitas as $receita){
            $totalReceita += $receita->valor;
        }

        $totalDespesa = 0;
        foreach($despesas as $despesa){
            $totalDespesa += $despesa->valor;
        }

        $saldoAtual = $totalReceita - $totalDespesa;

        return response()->json([
            'saldoAtual' => $saldoAtual
        ],200);
    }

   public function balancoMensal(Request $request)
   {
        return Transacoes::whereMonth('data', $request->mes)->whereYear('data', $request->ano)->get();
   }
}
