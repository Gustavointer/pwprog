@extends('templates.base')
@section('title', 'Visualizar imagem')
@section('h1', 'Visualizar imagem')

@section('content')
    <h1>Visualizar</h1>
    
    <!-- Duas formas de mostrar a variável na tela -->
    <p>Produto: {{$prod->nome}}</p>
    <p>Preço: <?php echo $prod->valor; ?></p>
    <p>{{$prod->descricao}}</p>
    <p><img src="{{asset('img/' . $prod->imagem)}}"></p>

@endsection