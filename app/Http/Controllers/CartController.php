<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->product_id);

        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity]
        );

        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function remove($id)
    {
        $cart= Cart::where('user_id', Auth::id())->where('id', $id)->first();
        if ($cart) {
            $cart->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho!');
    }

    public function update(Request $request, $id)
    {
        $cart = Car::where('user_id', Auth::id())->where('id', $id)->first();
        if ($cart) {
            $cart->update(['quantity' => $request->quantity]);
        }

        return redirect()->route('cart.index')->with('success', 'Quantidade atualizada!');
    }
}
