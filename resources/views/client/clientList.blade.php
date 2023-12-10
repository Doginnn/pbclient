@php use Carbon\Carbon;
@endphp
@extends('layout.header')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"> Lista de Clientes</i></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                @if (session('success'))
                    <div class="row sucesso">
                        <div style="position: absolute; right: center; top: 15;"
                             class="col-lg-3 col-md-3 alert alert-success font-weight-bold" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <script>
                        setTimeout(function () {
                            $('.success').hide(2000);
                        }, 2000);
                    </script><br><br><br>
                @endif
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Nome do cliente</th>
                                <th>Nome Social do Cliente</th>
                                <th>CPF/CNPJ</th>
                                <th>Data de Nascimento</th>
                                <th>Foto do Cliente</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clientList as $client)
                                <tr>
                                    <td>{{ $client->ds_nome }}</td>
                                    <td>{{ $client->ds_nome_social }}</td>
                                    <td>{{ $client->nu_cpf_cnpj }}</td>
                                    <td>
                                        @if ($client->dt_nascimento)
                                            {{ Carbon::createFromFormat('Y-m-d', $client->dt_nascimento)->format('d/m/Y') }}
                                        @else

                                        @endif
                                    </td>
                                    <td>{{ $client->ds_foto_path }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a type="button" class="btn btn-success mr-2"
                                           href="{{ route('clients.edit', $client->nu_seq_client) }}">
                                            <i class="fa fa-user" aria-hidden="true"> Visualizar</i>
                                        </a>
                                        <a type="button" class="btn btn-warning mr-2"
                                           href="{{ route('clients.edit', $client->nu_seq_client) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"> Editar</i>
                                        </a>
                                        <form action="{{ route('clients.destroy', $client->nu_seq_client) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Deseja realmente deletar este Cliente? Após confirmar, não terá mais como recuperar os dados excluídos!')">
                                                <i class="fa fa-trash-o" aria-hidden="true"> Deletar</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
