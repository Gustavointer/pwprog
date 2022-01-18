@extends('templates.base')
@section('title', 'Produtos')
@section('h1', 'Página de Produtos')

@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de produtos</p>
        <a href="{{route('produtos.inserir')}}" class="btn btn-primary">Inserir Produto</a>
    </div>
</div>

<div class="row">
        <ul>
            @foreach($prods as $prod)
                <li><img src="{{asset('img/' . $prod->imagem)}}"></li>
                <li><a href="{{ route('produtos.show', $prod) }}">{{$prod->name}}</a></li>
                <li>R$ {{$prod->price}}</li>
                <hr>
            @endforeach
        </ul>
        
<!--   <table class="table">
        <tr>
            <th>ID</th>
            <th width="50%">Nome</th>
            <th>Preço</th>
            <th>Gerenciar</th>
        </tr>

        @foreach($prods as $prod)
        <tr>
            <td>{{$prod->id}}</td>
            <td>
                <a href="{{ route('produtos.show', $prod) }}">{{$prod->name}}</a>
            </td>
            <td>R$ {{$prod->price}}</td>
            <td>
            <td>{{$prod->description}}</td>
            <td>
                @if(Auth::user() && Auth::user()->admin)<a href="{{ route('produtos.edit', $prod) }}" class="btn btn-primary btn-sm" role="button"><i class="bi bi-pencil-square"></i> Editar</a>
                <a href="{{ route('produtos.remove', $prod) }}" class="btn btn-danger btn-sm" role="button"><i class="bi bi-trash"></i> Apagar</a>@endif
            </td>
        </tr>
        @endforeach
    </table>-->
</div>
@endsection
