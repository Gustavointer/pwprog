@extends('templates.base')
@section('title', 'Visualizar produto')

@section('content')
<h1>{{ $prod->name }}</h1>
<p><img src="{{asset('img/' . $prod->imagem)}}"></p>
<p>Produto: {{$prod->name}}</p>
<p>Preço: {{$prod->price}}</p>
<p>{{$prod->descricao}}</p>

@endsection