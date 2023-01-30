<?php

namespace App\Http\Controllers;

use App\Models\Transacoes;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class TransacoesController extends Controller
{

    public function index()
    {
        return Transacoes::all();
    }

    public function adicionarTransacao(Request $request)
    {
        //converter valor para decimal
        $request->merge(['valor' => str_replace(',', '.', str_replace('.', '', $request->valor))]);
        $receita = Transacoes::create([
            'tipo' => $request->tipo,
            'id_categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'data' => $request->data,
            'valor' => $request->valor,
        ]);

        if ($receita) {
            return response()->json([
                'message' => 'Receita adicionada com sucesso!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Erro ao adicionar receita!'
            ], 500);
        }
    }

    public function calculaReceita()
    {
        $receitas = Transacoes::where('tipo', '1')->get();

        $total = 0.00;
        foreach ($receitas as $receita) {
            $total += (float)$receita->valor;
        }

        return response()->json([
            'total' => $total
        ], 200);
    }

    public function calculaDespesa()
    {
        $despesas = Transacoes::where('tipo', "0")->get();
        $total = 0.00;
        foreach ($despesas as $despesa) {

            $total += (float)$despesa->valor;
        }
        return response()->json([
            'total' => $total
        ], 200);
    }

    public function saldoAtual()
    {
        $receitas = Transacoes::where('tipo', '1')->get();
        $despesas = Transacoes::where('tipo', '0')->get();

        $totalReceita = 0;
        foreach ($receitas as $receita) {
            $totalReceita += $receita->valor;
        }

        $totalDespesa = 0;
        foreach ($despesas as $despesa) {
            $totalDespesa += $despesa->valor;
        }

        $saldoAtual = $totalReceita - $totalDespesa;

        return response()->json([
            'saldoAtual' => $saldoAtual
        ], 200);
    }

    public function balancoMensal(Request $request)
    {
        return Transacoes::whereMonth('data', $request->mes)->whereYear('data', $request->ano)->get();
    }

    public function listaTransacao(Request $request)
    {

        $tipo = $request->tipo;

        $transacoes = Transacoes::with('categoria')
            ->select('transacoes.*');

        if($tipo == '0'){
            $transacoes = $transacoes->where('tipo', $tipo);

        }
        if($tipo == '1'){
            $transacoes = $transacoes->where('tipo', $tipo);
           
        }
        if($request->categoria){
            $transacoes = $transacoes->where('id_categoria', $request->categoria);
        }
        if($request->mes){
            $transacoes = $transacoes->whereMonth('data', $request->mes);
        }
        if($request->ano){
            $transacoes = $transacoes->whereYear('data', $request->ano);
        }

        $orders = [
            'data',
            'descricao',
            'id_categoria',
            'tipo',
            'valor',
            ''

        ];

        $transacoes = $transacoes->orderBy($orders[$request->order[0]['column']], $request->order[0]['dir'])
            ->paginate($request->length, ['*'], 'page', ($request->start / $request->length) + 1)
            ->toArray();

        return ["draw" => $request->draw, "recordsTotal" => (int) $transacoes['to'], "recordsFiltered" => (int) $transacoes['total'], "data" => $transacoes["data"]];
    }
}
