@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inserir Cargos
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/cargo">Cargo</a></li>
        <li class="active">Novo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inserir Cargos</h3>
            </div>
            <!-- /.box-header -->
            
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route('cargo.store')}}" method="post">
               {{ csrf_field()}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
            	    <div class="form-group">
                  <label for="descricao">Titulo do Cargo</label>
                  <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite o titulo do Cargo">
                </div>
           	 
                  <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('cargo.index')}}" class="btn btn-warning">Voltar</a>
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