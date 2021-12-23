@extends('templates.base')
@section('title', 'Mudar Senha')
@section('h1', 'Mudar Senha')

@section('content')
    <form method="post" action="{{ route('profile.password_edit') }}">
    @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Senha atual</label>
            <input type="password" class="form-control" id="password" name="atual">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha nova</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="password-confirm" class="form-label">Confirmar senha nova</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Alterar</button>
        </div>
    </form>
@endsection