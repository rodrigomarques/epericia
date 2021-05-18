@extends('admin.layout')
@section('content')
    <div class="col-12">
    <div class="card">
            <form class="form-horizontal" method="post">
                <div class="card-body">
                    <h4 class="card-title">Usuário</h4>
                    <div class="row">
                    <div class="form-group row col-4">
                        <label for="login"
                            class="col-sm-3 text-end control-label col-form-label">Login</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="login" name="login"
                                placeholder="Login do Usuário" value="">
                        </div>
                    </div>
                    <div class="form-group row col-4">
                        <label for="perfil"
                            class="col-sm-3 text-end control-label col-form-label">Perfil</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="idperfil" name="idperfil">
                                <option value=""></option>
                                @if(isset($listaPerfil) && count($listaPerfil) > 0)
                                    @foreach($listaPerfil as $elem)
                                        <option value="{{ $elem->id }}">{{ $elem->nome }}</option>
                                    @endforeach
                                @endif 
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary" id="saveTpDoc">Buscar Usuário</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Usuários</h4>
                @if(isset($lista) && count($lista) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Login</th>
                                <th scope="col">Perfil</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lista as $elem)
                            <tr>
                                <td scope="row">{{ $elem->id }}</td>
                                <td scope="row">{{ $elem->nome }}</td>
                                <td scope="row">{{ $elem->login }}</td>
                                <td scope="row">{{ $elem->perfil->nome ?? '' }}</td>
                                <td scope="row">{{ $elem->email }}</td>
                                <td>
                                    <a href="{{ route('admin.usuario.edit', [ 'id' => $elem->id ]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.usuario.delete', [ 'id' => $elem->id ]) }}" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif 
            </div>
        </div>
    </div>
@endsection