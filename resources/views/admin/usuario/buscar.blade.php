@extends('admin.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Usuários</h4>
                @if(isset($lista) && count($lista) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Login</th>
                                <th scope="col">Login</th>
                                <th scope="col">Perfil</th>
                                <th scope="col">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lista as $elem)
                            <tr>
                                <th scope="row">{{ $elem->id }}</th>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif 
            </div>
        </div>
    </div>
@endsection