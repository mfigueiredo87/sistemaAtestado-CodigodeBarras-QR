@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inserir Membros de Direcção
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/direcao">Direcção</a></li>
        <li class="active">Novo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inserir Membros de Direcção</h3>
            </div>
            <!-- /.box-header -->
            
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route('direcao.store')}}" method="post">
               {{ csrf_field()}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
                  </div>

                   <div class="form-group">
                    <label for="bilhete">Nº de Bilhete</label>
                    <input type="text" class="form-control" id="bilhete" name="bilhete" placeholder="Digite o número de Bilhete">
                  </div>

                   <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="bilhete" name="email" placeholder="Digite o endereço de electrónico">
                  </div>

                  <div class="row">
                    <div class=" col-lg-4">
                    <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="bilhete" name="telefone" placeholder="Número de Telefone" maxlength="9">
                  </div>

                      <div class="form-group">
                      <label for="bilhete">Estado</label>
                      <select name="estado" id="estado" class="form-control">
                      <option selected disabled>Escolha o Estado</option>
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                      </select>
                     </div>


                   <div class="form-group">
                    <label for="bilhete">Cargo/Função</label>
                    <select name="cargo_id" id="cargo_id" class="form-control">
                    <option selected disabled>Escolha o Cargo</option>
                    @foreach($cargo as $carg)
                    <option value="{{$carg->id}}">{{$carg->descricao}}</option>
                   @endforeach
                  </select>
                  </div>
                    </div>
                  </div>
                  

             
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route('direcao.index')}}" class="btn btn-warning">Voltar</a>
              </div>
            
            </div>
    </form>
                </div>
       
          </div>
        
        </div>
        
      </div>
       
    </section>
    <!-- /.content -->
  </div>

@endsection