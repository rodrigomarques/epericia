@extends('admin.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="id"  value="" />
                <div class="card-body">
                    <h4 class="card-title">Usuário</h4>
                    <div class="form-group row">
                        <label for="nome"
                            class="col-sm-3 text-end control-label col-form-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Nome do Usuário" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="login"
                            class="col-sm-3 text-end control-label col-form-label">Login</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="login" name="login"
                                placeholder="Login do Usuário" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="senha"
                            class="col-sm-3 text-end control-label col-form-label">Senha</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="senha" name="senha"
                                placeholder="Senha" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email"
                            class="col-sm-3 text-end control-label col-form-label">E-mail</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="E-mail do usuário" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="perfil"
                            class="col-sm-3 text-end control-label col-form-label">Perfil</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="email" name="perfil">
                                <option value=""></option>
                                @if(isset($listaPerfil) && count($listaPerfil) > 0)
                                    @foreach($listaPerfil as $elem)
                                        <option value="{{ $elem->id }}">{{ $elem->nome }}</option>
                                    @endforeach
                                @endif 
                            </select>
                        </div>
                    </div>

                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="saveTpDoc">Salvar Usuário</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection