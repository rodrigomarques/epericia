@extends('admin.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="id"  value="{{ $obj->id }}" />
                <div class="card-body">
                    <h4 class="card-title">Perfil</h4>
                    <div class="form-group row">
                        <label for="nome"
                            class="col-sm-3 text-end control-label col-form-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Nome do Perfil" value="{{ $obj->nome }}">
                        </div>
                    </div>
                    
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="saveTpDoc">Salvar Perfil</button>
                    </div>
                </div>
            </form>
        </div>
        @if(isset($lista) && count($lista) > 0)
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lista as $elem)
                    <tr>
                        <th scope="row">{{ $elem->id }}</th>
                        <td>{{ $elem->nome }}</td>
                        <td>
                            <a href="{{ route('admin.usuario.perfil.edit', [ 'id' => $elem->id ]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.usuario.perfil.delete', [ 'id' => $elem->id ]) }}" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif 
    </div>
@endsection