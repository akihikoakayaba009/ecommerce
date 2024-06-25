@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Meu Carrinho</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cart->isEmpty())
        <p>Seu carrinho está vazio.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                         
                        </td>
                        <td>{{ $item->product->price }}</td>
                        <td>{{ $item->product->price * $item->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
