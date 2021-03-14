@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Actualizar
        <small>Edite ou insira seus textos rapidamente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/custo_servico">Serviços e Custos</a></li>
        <li class="active">Novo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inserir Custos</h3>
            </div>
            <!-- /.box-header -->
            
           @include('includes.message')
            <!-- form start -->
              <form role="form" action="{{route('custo_servico.update',$custo_servico->id)}}" method="post">
               {{ csrf_field()}}
               {{ method_field('PATCH')}}
            <div class="box-body">
            <div class="col-lg-offset-3 col-lg-3">
                   <div class="form-group">
                    <label class="servico">Serviço</label>
                    <select name="servico" id="servico" class="form-control">
                    <!-- <option selected disabled>Escolha o Serviço</option> -->
                    <option value="{{$custo_servico->id}}">Actual: {{$custo_servico->servico->descricao}}</option>
                    @foreach($servico as $servic)
                    <option value="{{$servic->id}}">{{$servic->descricao}}</option>
                   @endforeach
                  </select>
                </div>

                 <div class="form-group">
                    <label class="valor">Valor:</label>
                    <select name="valor" id="valor" class="form-control">
                    <!-- <option selected disabled>Escolha o Custo</option> -->
                    <option value="{{$custo_servico->id}}">Actual: {{$custo_servico->custo->valor}}</option>
                    @foreach($custo as $cust)
                    <option value="{{$cust->id}}">{{$cust->valor}} ,00 KZs</option>
                   @endforeach
                  </select>
                </div>
             
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('custo_servico.index')}}" class="btn btn-warning">Voltar</a>
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