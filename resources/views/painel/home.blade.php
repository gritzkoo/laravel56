@extends('painel.basetemplate')
@section('content')
    <div class="row">
        <div class="col-12 jumbotron text-center">
            <h1>Seja bem vindo ao painel administrativo!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>
                Aqui você pode usar as ferramentas para trocar o conteúdo dinâmico do seu site.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 form-group">
            <h3>Exemplo template de tabelas</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>COL1</th>
                        <th>COL2</th>
                        <th>COL3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>IDX</td>
                        <td><span>Property text1</span></td>
                        <td>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash-alt"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>IDX</td>
                        <td><input type="text" class="form-control" value="Property text1"></td>
                        <td>
                            <i class="fas fa-check"></i>
                            <i class="fas fa-times"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 form-group">
            <div class="form-row">
                <div class="col-4">
                    <label for="inputtext">Input comum:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-4">
                    <label for="input chackbox">CheckBox:</label>
                    <input type="checkbox" class="form-control">
                </div>
                <div class="col-4">
                    <label for="inputradio">Input Radio</label>
                    <input type="radio" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label for="textarea">TextArea</label>
                    <textarea  cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>

@stop