@extends('layout.header')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-github-alt"> Dados do Cliente</i></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Perfil do Cliente -->
            <div class="tile">
                <div class="row user">
                    <div class="col-md-12">
                        <div class="profile">
                            <div class="info">
                                <!-- Verificação se há uma imagem associada ao cliente -->
                                @if ($client->ds_foto_path)
                                    <img class="user-img" src="{{ asset($client->ds_foto_path) }}" alt="Foto do Cliente">
                                @else
                                    <img class="user-img" src="{{ asset('images/avatar.png') }}" alt="Avatar Padrão">
                                @endif
                                <h4>{{ $client->ds_nome }}</h4>
                                <p>Cliente</p>
                            </div>
                            <div class="cover-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <!-- Dados do Cliente -->
            <div class="tile">
                <div class="row-user">
                    <div class="row">
                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_nome">Nome do Cliente</label>
                                <input class="form-control" value="{{ $client->ds_nome }}" name="ds_nome" id="ds_nome" type="text" disabled>
                            </div>
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_nome_social">Nome Social do Cliente</label>
                                <input class="form-control" value="{{ $client->ds_nome_social }}" name="ds_nome_social" id="ds_nome_social" type="text" disabled>
                            </div>
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="nu_cpf_cnpj">CPF/CNPJ</label>
                                <input  class="form-control" value="{{ $client->nu_cpf_cnpj }}" name="nu_cpf_cnpj" id="nu_cpf_cnpj" type="text" disabled>
                            </div>
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="dt_nascimento">Data de Nascimento</label>
                                <input class="form-control" value="{{ $client->dt_nascimento }}" name="dt_nascimento" id="dt_nascimento" type="date" disabled>
                            </div>
                        </div>

                        <div class="col-4"><br><br>
                            <div class="form-group">
                                <a href="{{ route('clients.index') }}" class="btn btn-primary">Listar Clientes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
