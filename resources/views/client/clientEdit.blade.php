@extends('layout.header')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-github-alt"> Edição de Cliente</i></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                @if (session('success'))
                    <div  class="row sucesso">
                        <div style="position: absolute; right: center; top: 15;" class="col-lg-3 col-md-3 alert alert-success font-weight-bold" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <script >
                        setTimeout(function(){
                            $('.success').hide(2000);
                        }, 2000);
                    </script><br><br>
                @endif
                <form action="{{route('clients.update', $client->nu_seq_client)}}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="nu_seq_client" id="nu_seq_client" value="{{ old('$client->nu_seq_client') }}">
                    <div class="row">
                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_nome">Nome do Cliente *</label>
                                <input class="form-control" value="{{ $client->ds_nome }}" name="ds_nome" id="ds_nome" type="text" required>
                            </div>
                            <small class="form-text text-muted">Campo <b>Obrigatório*</b></small>
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_nome_social">Nome Social do Cliente *</label>
                                <input class="form-control" value="{{ $client->ds_nome_social }}" name="ds_nome_social" id="ds_nome_social" type="text" required>
                            </div>
                            <small class="form-text text-muted">Campo <b>Obrigatório*</b></small>
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="nu_cpf_cnpj">CPF/CNPJ *</label>
                                <input  class="form-control" value="{{ $client->nu_cpf_cnpj }}" name="nu_cpf_cnpj" id="nu_cpf_cnpj" type="text" placeholder="000.000.000-00 ou 00.000.000/0000-00" required>
                            </div>
                            <small class="form-text text-muted">Campo <b>Obrigatório*</b></small>
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="dt_nascimento">Data de Nascimento</label>
                                <input class="form-control" value="{{ $client->dt_nascimento }}" name="dt_nascimento" id="dt_nascimento" type="date" required>
                            </div>
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_foto_path">Foto do Cliente</label>
                                <input class="form-control" value="{{ $client->ds_foto_path }}" name="ds_foto_path" id="ds_foto_path" type="file" required>
                            </div>
                            <small class="form-text text-muted" id="fileHelp">Enviar apenas arquivos .JPG ou .PNG</small>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">Salvar</button>
                                <a href="{{ route('clients.index') }}" class="btn btn-primary">Listar Clientes</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
