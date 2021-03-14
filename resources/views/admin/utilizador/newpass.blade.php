@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alterar Senha
        <small>Preencha os campos para alterar a SENHA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/utilizador">Utilizadores</a></li>
        <li class="active">Alterar Senha</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Alterar Senha</h3>
            </div>
            <!-- /.box-header -->
            
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route ('utilizador.update',$user->id)}}" method="post">
               {{ csrf_field()}}
                {{ method_field('PATCH')}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-6">
               <div class="form-group">
                  <label for="nome">Seu Nome</label>
                  <input type="text" class="form-control" id="descricao" name="name" readonly="" value="{{$user->name}}">
                </div>
                 <div class="form-group">
                  <label for="nome">Seu E-mail</label>
                  <input type="text" class="form-control" id="descricao" name="email" readonly="" value="{{$user->email}}">
                </div>
                 <div class="form-group">
                  <label for="nome">Seu Contacto</label>
                  <input type="text" class="form-control" id="descricao" name="phone" readonly="" value="{{$user->phone}}">
                </div>
                
            	    <div class="form-group">
                  <label for="senha_actual">Senha actual</label>
                  <input type="password" class="form-control" id="descricao" name="senha_actual" placeholder="Digite a senha antiga">
                </div>
                
                <div class="form-group">
                  <label for="senha_nova">Nova Senha</label>
                  <input type="password" class="form-control" id="descricao" name="password" placeholder="Digite a nova senha">
                </div>
                  <div class="form-group">
                  <label for="password_confirmation">Confirmar Password</label>
                  <input type="password" class="form-control" id="slug" name="password_confirmation" placeholder="Confirme a password">
                </div>
           	 
             <!--      <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('utilizador.index')}}" class="btn btn-warning">Voltar</a>
              </div> -->
            
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