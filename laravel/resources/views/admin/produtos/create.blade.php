@extends('admin.layouts.admin')
@section('title', 'Adicionar Produto')
@section('description', 'Novo Poroduto')
@section('content')



<div class="container-fluid">
  <!-- HEADER -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Adicionar Produto</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Loja</a></li>
          <li class="breadcrumb-item active">Produtos</li>
          <li class="breadcrumb-item active">Adicionar Produto</li>
        @if (Auth::guest())
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
            </a>

            <ul class="dropdown-menu" role="menu">
              <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Sair
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        @endif
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="clearfix hidden-md-up"></div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon elevation-1 bg-info"><i class="fa fa-cubes"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Nº de Produtos</span>
        <span class="info-box-number">000</span>
      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Novo Produto</h3>
        </div>
          <br>

          
          <!-- /.card-header -->
          <div class="card-body">
            @include('admin.produtos.components.form')
            
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection
