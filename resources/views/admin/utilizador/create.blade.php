@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registar Utilizador
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/user">Utilizador</a></li>
        <li class="active">Novo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route ('utilizador.store')}}" method="post">
               {{ csrf_field()}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
            	    <div class="form-group">
                  <label for="name">Nome de Utilizador</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do utilizador" value="{{old('name')}}">
                </div>
           		
           	    <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Digite o e-mail" value="{{old('email')}}">
                </div>

                  <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="slug" name="password" placeholder="Digite a password" value="{{old('password')}}">
                </div>

                  <div class="form-group">
                  <label for="password_confirmation">Confirmar Password</label>
                  <input type="password" class="form-control" id="slug" name="password_confirmation" placeholder="Confirme a password">
                </div>

                  <div class="form-group">
                  <label for="Telemóvel">Telemóvel</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite um numero de Telemóvel" maxlength="12" value="{{old('phone')}}">
                </div> 

                  <div class="form-group">
                  <label for="checkbox">Selecione a caixa de verificação para activar o Utilizador</label>
                    <div class="checkbox">
                         <label><input type="checkbox" name="status" @if(old('status') == 1) checked @endif value="1">Estado</label>
                    </div>
                </div> 
                <div class="row">
                   <div class="form-group col-lg-4">
                  <label for="tipo">Tipo de Utilizador</label>
                    <select class="form-control" name="role" id="select-role">
                      <option value="" class="activa">--Seleccionar--</option>
                      <option value="0">Administrador</option>
                      <option value="1">Utilizador</option>
                    </select> 
                  </div>
                </div>
                 

                <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route('utilizador.index')}}" class="btn btn-warning">Voltar</a>
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