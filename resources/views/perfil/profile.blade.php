@extends('templates.base')
@section('title', 'Perfil de Usuário')
@section('h1') Página de {{Auth::user()->name}} @endsection

@section('content')
<p>Seu dados pessoal</p>
<ul>
    <li><strong>Nome: </strong>{{Auth::user()->name}}</li>
    <li><strong>Usuário: </strong>{{Auth::user()->username}}</li>
    <li><strong>Email: </strong>{{Auth::user()->email}}</li>
</ul>

<a href="{{ route('profile.edit')}}" role="button" class="btn btn-outine-lsecondary ">Alterar dados do perfil</a>
<a href="{{ route('profile.password_edit')}}" role="button" class="btn btn-outline-secondary ">Alterar senha</a>
@endsection