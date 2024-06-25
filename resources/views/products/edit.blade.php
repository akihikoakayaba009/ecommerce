@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Produto</h1>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('products.form')
            <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
        </form>
    </div>
@endsection
