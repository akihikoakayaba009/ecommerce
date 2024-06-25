@extends('layouts.default')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Produtos</h1>
       
        <div style="overflow-x: auto;">
        <table class="table mx-auto">
        <a href="{{ route('products.create') }}" class="bg-indigo-500 text-white px-4 py-2 mt-2 inline-block" style="width: 200px;">Adicionar produto</a>

          
                <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->cover)
                                    <img src="{{ asset($product->cover) }}" alt="Cover Image" style="max-width: 100px; max-height: 100px;" class="img-thumbnail mx-auto d-block">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}" class="bg-indigo-500 text-white px-4 py-2 mt-2 inline-block">Editar</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 mt-2 inline-block">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
