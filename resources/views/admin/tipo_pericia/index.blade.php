@extends('admin.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="id"  value="{{ $obj->id }}" />
                <div class="card-body">
                    <h4 class="card-title">Tipo de Perícia</h4>
                    <div class="form-group row">
                        <label for="descricao"
                            class="col-sm-3 text-end control-label col-form-label">Tipo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tipo" name="tipo"
                                placeholder="Tipo do Perícia" value="{{ $obj->tipo }}">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="saveTpDoc">Salvar Tipo de Perícia</button>
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
                        <th scope="col">Descrição</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lista as $elem)
                    <tr>
                        <th scope="row">{{ $elem->id }}</th>
                        <td>{{ $elem->tipo }}</td>
                        <td>
                            @if(checkRole('admin.tipo_pericia.edit'))
                            <a href="{{ route('admin.tipo_pericia.edit', [ 'id' => $elem->id ]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            @endif
                            @if(checkRole('admin.tipo_pericia.delete'))
                            <a href="{{ route('admin.tipo_pericia.delete', [ 'id' => $elem->id ]) }}" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>
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