@extends('layouts.default')

@section('content')
<!-- resources/views/sobre-nos.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sobre Nós</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">My store</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a href="{{ url('/') }}" class="mr-5 hover:text-gray-900">Home</a>
                <a href="{{ route('sobre_nos') }}" class="mr-5 hover:text-gray-900">Sobre Nós</a>
                <a href="{{ route('products.index') }}" class="mr-5 hover:text-gray-900">Produtos</a>
                <a href="{{ route('cart.index') }}" class="mr-5 hover:text-gray-900">Carrinho</a>
            </nav>
            @auth
            <span class="mr-3 text-gray-700 font-bold">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="mr-5 hover:text-gray-900">Sair</button>
            </form>
            @endauth
        </div>
    </header>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Sobre Nós</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">essa é a pagina  index com nome dos integrantes e explicaçao do que foi feito no trabalho 
                    fizemos o mais parecido com site de ecommerce colocamos um carrinho e a autenticaçao de login sao duas funçoes que utilizam rotas e fazem consulta no banco de dados
                todos os formularios ao tipados e na parte de login tem verificaçao de dados existentes e na parte de exclusao do carrinho ele tem a verificaçao dos dados quando exclui o adiciona ele aparece que o dado foi excluido e um extra
            foi colocar uma funçao que guarda as imagens de upload na pasta image </p>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="h-full bg-gray-100 p-8 rounded">
                        <h2 class="text-gray-900 text-lg font-medium title-font mb-2">Membro 1</h2>
                        <p class="leading-relaxed text-base mb-4">Marcos Pedroso, Matricula N:197684</p>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="h-full bg-gray-100 p-8 rounded">
                        <h2 class="text-gray-900 text-lg font-medium title-font mb-2">Membro 2</h2>
                        <p class="leading-relaxed text-base mb-4">Michel Luigi , Matricula N:200077</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
</body>
</html>
