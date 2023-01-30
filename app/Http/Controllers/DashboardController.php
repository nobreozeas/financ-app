<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Transacoes;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $categorias = Categoria::all();

        return view('dashboard.index', compact('categorias'));
    }
}
