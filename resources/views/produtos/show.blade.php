@extends('templates.base')
@section('title', 'Visualizar produto')

@section('content')
<h1>{{ $prod->name }}</h1>
<p>Preço: R$ {{$prod->price}}</p>
<p>Descrição do produto: {{ $prod->description }}</p>
@endsection