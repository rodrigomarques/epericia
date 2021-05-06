@extends('admin.layout')
@section('content')
    
    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="post">
                <div class="card-body">
                    <h4 class="card-title">Tags</h4>
                    <div class="form-group row">
                        <label for="descricao"
                            class="col-sm-3 text-end control-label col-form-label">Descrição</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="descricao" name="descricao"
                                placeholder="Descrição da Tag">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Salvar Tag</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection