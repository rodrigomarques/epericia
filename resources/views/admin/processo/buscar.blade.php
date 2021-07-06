@extends('admin.layout')
@section('content')
    <div class="col-12">
    <div class="card">
            <form class="form-horizontal" method="post">
                <div class="card-body">
                    <h4 class="card-title">Processo</h4>
                    <div class="row">
                    <div class="form-group row col-4">
                        <label for="login"
                            class="col-sm-3 text-end control-label col-form-label">Número do Processo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="n_processo" name="n_processo"
                                placeholder="Número do Processo" value="{{ $n_processo }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary" id="saveTpDoc">Buscar Processo</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Processos</h4>
                @if(isset($lista) && count($lista) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Número</th>
                                <th scope="col">Local</th>
                                <th scope="col">Vara</th>
                                <th scope="col">Objeto</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Réu</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lista as $elem)
                            <tr>
                                <td scope="row">{{ $elem->num_processo }}</td>
                                <td scope="row">{{ $elem->local }}</td>
                                <td scope="row">{{ $elem->vara }}</td>
                                <td scope="row">{{ $elem->objeto->descricao ?? '' }}</td>
                                <td scope="row">
                                    @php
                                        $autor = \App\Models\Autor::where("processo_id", $elem->id)->first();
                                        if($autor){
                                            echo $autor->nome;
                                        }
                                    @endphp
                                </td>
                                <td scope="row">
                                    @php
                                        $reu = \App\Models\Reu::where("processo_id", $elem->id)->first();
                                        if($reu){
                                            echo $reu->nome;
                                        }
                                    @endphp
                                </td>
                                <td>
                                @if(checkRole('admin.processo.pericia'))
                                    <a href="{{ route('admin.processo.pericia', [ 'id' => $elem->id, 'processo' => $elem->num_processo ]) }}" class="btn btn-primary text-white"><i class="mdi mdi-book-open"></i></a>
                                @endif

                                @if(checkRole('admin.processo.delete'))
                                    <a href="{{ route('admin.processo.delete', [ 'id' => $elem->id ]) }}" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>
                                @endif
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
