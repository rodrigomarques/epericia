@extends('admin.layout')
@section('content')
    <div class="col-12">
        <form class="form-horizontal" method="post">
            @if(isset($listaUrl) && count($listaUrl) > 0)
                @foreach($listaUrl as $key => $urls)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ getRotaTitle($key) }}</h4>
                            <div class="form-group row">
                                @if(isset($urls) && count($urls) > 0)
                                    @foreach($urls as $url)
                                        <div class="col-4 mb-2">
                                            <input type="checkbox" class="form-check-input" id="id-{{ $url->id }}" name="acesso[]">
                                            <label class="form-check-label mb-0" for="id-{{ $url->id }}">{{ $url->titulo }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="card">
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="saveTpDoc">Salvar Acesso</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection