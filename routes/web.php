<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransacoesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/categorias', [CategoriaController::class, 'listaCategoria'])->name('categorias.lista');
Route::post('/categoria/edita', [CategoriaController::class, 'editarCategoria'])->name('categorias.edita');
Route::post('/categoria/deleta', [CategoriaController::class, 'deletarCategoria'])->name('categorias.deleta');
Route::post('/categoria/adiciona', [CategoriaController::class, 'adicionarCategoria'])->name('categorias.adiciona');

Route::get('/transacoes', [TransacoesController::class, 'index'])->name('transacoes.index');
Route::post('/transacoes/listar', [TransacoesController::class, 'listaTransacao'])->name('transacoes.listar');
Route::post('/transacao/adiciona', [TransacoesController::class, 'adicionarTransacao'])->name('transacoes.adiciona');
Route::get('/transacao/calcula', [TransacoesController::class, 'calculaReceita'])->name('transacoes.calculaReceita');
Route::get('/transacao/calcula-despesa', [TransacoesController::class, 'calculaDespesa'])->name('transacoes.calculaDespesa');
Route::get('transacao/saldo-atual', [TransacoesController::class, 'saldoAtual'])->name('transacoes.saldoAtual');
Route::post('transacoes/balanco-mensal', [TransacoesController::class, 'balancoMensal'])->name('transacoes.balancoMensal');

Route::get('/transacoes/categorias', [CategoriaController::class, 'listaTransacoesCategoria'])->name('categorias.listaTransacoesCategoria');
