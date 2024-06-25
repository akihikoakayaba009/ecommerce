<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Certifique-se de que o namespace do Model Product está correto

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Middleware para autenticação, se necessário
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all(); // Recupera todos os produtos do banco de dados usando o Model Product
        return view('home', compact('products')); // Passa os produtos para a view 'home'
    }
}
