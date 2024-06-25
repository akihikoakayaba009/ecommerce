
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Produto</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('products.form')
            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>
@endsection
