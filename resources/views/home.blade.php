@extends('layouts.default')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Produtos</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset($product->cover) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                        <p class="text-gray-600 mt-2">${{ $product->price }}</p>
                        <p class="text-gray-600">Estoque: {{ $product->stock }}</p>
                        <p class="text-gray-600">{{ $product->description }}</p>
                        <a href="{{ route('show', ['id' => $product->id]) }}" class="text-indigo-500 hover:underline">ver mais</a>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <label for="quantity">Quantidade:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}" required>
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 mt-2 inline-block">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
