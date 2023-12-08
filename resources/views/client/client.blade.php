@extends('layout.header')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"> Cadastro de Clientes</i></h1>
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
                            $('.success').hide(4000);
                        }, 4000);
                    </script><br><br><br>
                @endif
                @if (session('error'))
                    <div  class="row error">
                        <div style="position: absolute; right: center; top: 15;" class="col-lg-3 col-md-3 alert alert-danger font-weight-bold" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <script >
                        setTimeout(function(){
                            $('.error').hide(4000);
                        }, 4000);
                    </script><br><br>
                @endif
                <form action="{{ route('clients.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="nu_seq_client" id="nu_seq_client" value="{{ old('nu_seq_client') }}">
                    <div class="row">
                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_nome">Nome do Cliente *</label>
                                <input class="form-control" value="{{ old('ds_nome') }}" name="ds_nome" id="ds_nome" type="text" required>
                            </div>
                            <small class="form-text text-muted">Campo <b>Obrigatório*</b></small>
                            @error('ds_nome')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_nome_social">Nome Social do Cliente *</label>
                                <input class="form-control" value="{{ old('ds_nome_social') }}" name="ds_nome_social" id="ds_nome_social" type="text" required>
                            </div>
                            <small class="form-text text-muted">Campo <b>Obrigatório*</b></small>
                            @error('ds_nome')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="nu_cpf_cnpj">CPF/CNPJ *</label>
                                <input  class="form-control" value="{{ old('nu_cpf_cnpj') }}" name="nu_cpf_cnpj" id="nu_cpf_cnpj" type="text" placeholder="000.000.000-00 ou 00.000.000/0000-00" required>
                            </div>
                            <small class="form-text text-muted">Campo <b>Obrigatório*</b></small>
                            @error('nu_cpf_cnpj')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="dt_nascimento">Data de Nascimento</label>
                                <input class="form-control" value="{{ old('dt_nascimento') }}" name="dt_nascimento" id="dt_nascimento" type="date">
                            </div>
                            @error('dt_nascimento')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4"><br>
                            <div class="form-group">
                                <label for="ds_foto_path">Foto do Cliente</label>
                                <input class="form-control" value="{{ old('ds_foto_path') }}" name="ds_foto_path" id="ds_foto_path" type="file">
                            </div>
                            <small class="form-text text-muted" id="fileHelp">Enviar apenas arquivos .JPG ou .PNG</small>
                        </div>
                        @error('ds_foto_path')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

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
