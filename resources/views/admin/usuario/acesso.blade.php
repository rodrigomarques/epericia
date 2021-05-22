@extends('admin.layout')
@section('content')
    <div class="col-12">
        <form class="form-horizontal" method="post">
        <div class="col-12 mb-2">
            <input type="checkbox" class="form-check-input todos" id="todos" value="1">
            <label class="form-check-label mb-0" for="todos">Todos</label>
        </div>
            @if(isset($listaUrl) && count($listaUrl) > 0)
                @foreach($listaUrl as $key => $urls)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ getRotaTitle($key) }}</h4>
                            <div class="form-group row">
                                @if(isset($urls) && count($urls) > 0)
                                    @foreach($urls as $url)
                                        <div class="col-4 mb-2">
                                            <input type="checkbox" class="form-check-input inp-check" id="id-{{ $url->id }}" name="acesso[]" @if(in_array($url->id, $urlSelecionada)) checked @endif value="{{ $url->id }}">
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

    <script>
        document.querySelector(".todos").addEventListener('click', (event) => {
            let check = event.target.checked

            document.querySelectorAll(".inp-check").forEach(item => {
                if(check){
                    item.checked = true
                }else{
                    item.checked = false
                }
            })
        })
    </script>
@endsection