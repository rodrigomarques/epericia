@extends('admin.layout')
@section('content')

    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="id"  value="{{ $obj->id }}" />
                <div class="card-body">
                    <h4 class="card-title">Local</h4>
                    <div class="form-group row">
                        <label for="nome"
                            class="col-sm-3 text-end control-label col-form-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Nome do local" value="{{ $obj->nome }}">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Salvar Local</button>
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
                        <th scope="col">Nome</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lista as $elem)
                    <tr>
                        <th scope="row">{{ $elem->id }}</th>
                        <td>{{ $elem->nome }}</td>
                        <td>
                            @if(checkRole('admin.local.edit'))
                            <a href="{{ route('admin.local.edit', [ 'id' => $elem->id ]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            @endif
                            @if(checkRole('admin.local.delete'))
                            <a href="{{ route('admin.local.delete', [ 'id' => $elem->id ]) }}" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

@endsection
