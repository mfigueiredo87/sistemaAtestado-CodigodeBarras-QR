@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editor de Efeitos
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/efeito">Efeitos</a></li>
        <li class="active">Editar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Efeito</h3>
            </div>
            <!-- /.box-header -->
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route ('efeito.update',$efeito->id)}}" method="post">
               {{ csrf_field()}}
               {{ method_field('PATCH')}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
                  <div class="form-group">
                  <label for="nome">Descrição do Efeito:</label>
                  <input type="text" class="form-control" id="nome" name="nome" 
                  value="{{$efeito->nome}}"
                   >
                </div>
                  <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('efeito.index')}}" class="btn btn-warning">Voltar</a>
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