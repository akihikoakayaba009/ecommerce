<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importe o model Product aqui, se necessário
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Exemplo de método index para listar produtos
    public function index()
    {
        $products = Product::all(); // Exemplo simples de consulta aos produtos

        return view('products.index', compact('products'));
    }

    // Exemplo de método show para exibir detalhes de um produto específico
    public function show($id)
    {
        $product = Product::findOrFail($id); // Busca o produto pelo ID

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        // Encontre o produto pelo ID
        $product = Product::findOrFail($id);

        // Retorne a view com o formulário de edição e os dados do produto
        return view('products.edit', compact('product'));
    }

    /**
 * Remove o produto do banco de dados.
 *
 * @param  int  $id  ID do produto a ser removido
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    // Encontra o produto pelo ID e deleta
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')
                     ->with('success', 'Produto deletado com sucesso.');

                    
}
/**
 * Atualiza o produto no banco de dados.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id  ID do produto a ser atualizado
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    // Validação dos dados do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'cover' => 'nullable|image|max:2048', // Apenas permita imagens com no máximo 2MB
    ]);

    // Encontra o produto pelo ID
    $product = Product::findOrFail($id);

    // Atualiza os dados do produto
    $product->name = $request->name;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->description = $request->description;

    // Verifica se foi enviada uma nova imagem e a salva
    if ($request->hasFile('cover')) {
        // Exclui a imagem antiga, se houver
        if ($product->cover && file_exists(public_path($product->cover))) {
            unlink(public_path($product->cover));
        }

        $cover = $request->file('cover');
        $coverName = time() . '.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('images'), $coverName);
        $product->cover = 'images/' . $coverName; // Salva o caminho da nova imagem no banco de dados
    }

    $product->save();

    return redirect()->route('products.index')
                     ->with('success', 'Produto atualizado com sucesso.');
}

/**
 * Salva um novo produto no banco de dados.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    // Validação dos dados do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'cover' => 'nullable|image|max:2048', // Apenas permita imagens com no máximo 2MB
    ]);

    // Salva o produto no banco de dados
    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->description = $request->description;

    // Verifica se foi enviada uma imagem e a salva
    if ($request->hasFile('cover')) {
        $cover = $request->file('cover');
        $path = $cover->store('public/covers'); // Salva a imagem em storage/app/public/covers
        $product->cover = $path;
    }

    $product->save();

    return redirect()->route('products.index')
                     ->with('success', 'Produto criado com sucesso.');
}
/**
 * Mostra o formulário para criar um novo produto.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('products.create');
}

}
