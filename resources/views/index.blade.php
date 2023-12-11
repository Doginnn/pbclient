@extends('layout.header')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-large"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <a href="{{ route('clients.create') }}"><i class="icon fa fa-user-plus fa-3x"></i></a>
                <div class="info">
                    <h4><b>Novo Cliente</b></h4>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <a href="{{ route('clients.index') }}"><i class="icon bi bi-person-fill-gear fa-3x"></i></a>
                <div class="info">
                    <h4><b>Editar Clientes</b></h4>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4><b>Clientes Cadastrados</b></h4>
                    <p><b>{{ DB::table('clients')->count() }}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
