@extends('admin.layout')
@section('content')

    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="post">
                <input type="hidden" name="id"  />
                <div class="card-body">
                    <h4 class="card-title">Processo</h4>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="num_processo"
                                class="control-label">Número</label>
                                <input type="text" class="form-control" id="num_processo" name="num_processo" placeholder="Número do processo" >
                        </div>
                        <div class="form-group col-6">
                            <label for="local"
                                class="control-label">Local</label>
                                <input type="text" class="form-control" id="local" name="local" placeholder="Nome do Autor" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="objeto"
                                class="control-label">Objeto</label>
                                <select name="objeto" class="objeto form-control">
                                    @foreach($listaObj as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->descricao }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="vara"
                                class="control-label">Vara</label>
                                <input type="text" class="form-control" id="vara" name="vara" placeholder="Nome do Autor" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="cidade_processo"
                                class="control-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade_processo" name="cidade_processo" placeholder="Nome do Autor" >
                        </div>
                        <div class="form-group col-6">
                            <label for="estado_processo"
                                class="control-label">Estado</label>
                                <select name="estado_processo" class="estado_processo form-control">
                                    <option value="AC">AC</option>
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <div class="linha_autor">
                                <label for="autor"
                                    class="control-label">Autor</label>
                                    <input type="text" class="form-control autor" id="autor" name="autor[]" placeholder="Nome do Autor" >
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="linha_autor">
                                <label for="reu"
                                    class="control-label">Réu</label>
                                    <input type="text" class="form-control reu" id="reu" name="reu[]" placeholder="Nome do Réu" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="ajuizamento"
                                class="control-label">Ajuizamento</label>
                                <input type="text" class="form-control ajuizamento datepicker-autoclose" id="ajuizamento" name="ajuizamento" placeholder="Ajuizamento" >
                        </div>
                        <div class="form-group col-4">
                            <label for="citacao"
                                class="control-label">Citação</label>
                                <input type="text" class="form-control citacao datepicker-autoclose" id="citacao" name="citacao" placeholder="Citação" >
                        </div>
                        <div class="form-group col-4">
                            <label for="justica_gratuita"
                                class="control-label">Justiça Gratuita</label>
                                <select name="justica_gratuita" id="justica_gratuita" class="form-control">
                                    <option value="NÃO">NÃO</option>
                                    <option value="SIM">SIM</option>
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="peticao_inicial"
                                class="control-label">Petição Inicial</label>
                                <textarea name="peticao_inicial" id="peticao_inicial" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="resumo"
                                class="control-label">Resumo</label>
                                <textarea name="resumo" id="resumo" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Salvar Processo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('matrix/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('matrix/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
    jQuery('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format : 'dd/mm/yyyy'
    })
    </script>

@endsection
