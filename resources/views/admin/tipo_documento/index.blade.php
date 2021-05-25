@extends('admin.layout')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('matrix/assets/libs/quill/dist/quill.snow.css') }}">

    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="id"  value="{{ $obj->id }}" />
                <div class="card-body">
                    <h4 class="card-title">Tipo de Documento</h4>
                    <div class="form-group row">
                        <label for="descricao"
                            class="col-sm-3 text-end control-label col-form-label">Tipo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tipo" name="tipo"
                                placeholder="Tipo do Documento" value="{{ $obj->tipo }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tag"
                            class="col-sm-3 text-end control-label col-form-label">Tag</label>
                        <div class="col-sm-9">
                        <select class="select2 form-select shadow-none" name="tag" style="width: 100%">
                            <option value="">Select</option>
                            @if(isset($listaTag) && count($listaTag) > 0)
                                @foreach($listaTag as $tag)
                                    <option value="{{ $tag->id }}" @if($tag->id == $obj->tag_id) selected @endif>{{ $tag->descricao }}</option>
                                @endforeach
                            @endif
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descricao"
                            class="col-sm-3 text-end control-label col-form-label">Texto</label>
                        <div class="col-sm-9">
                            <div id="editor" name="texto" style="height: 300px;">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="quill-html" id="quill-html">
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="saveTpDoc">Salvar Tipo de Documento</button>
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
                            @if(checkRole('admin.tipo_documento.edit'))
                            <a href="{{ route('admin.tipo_documento.edit', [ 'id' => $elem->id ]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            @endif
                            @if(checkRole('admin.tipo_documento.delete'))
                            <a href="{{ route('admin.tipo_documento.delete', [ 'id' => $elem->id ]) }}" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif 
    </div>

    <script src="{{ asset('matrix/assets/libs/quill/dist/quill.min.js') }}"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        document.getElementById("saveTpDoc").addEventListener('click', () => {
            let html = quill.root.innerHTML
            document.getElementById("quill-html").value = html
        })

        quill.root.innerHTML = "{!! $obj->texto !!}"
        document.getElementById("quill-html").value = "{!! $obj->texto !!}"

    </script>
@endsection