@extends('admin/layouts/app')
@section('headSection')

<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bem vindo a página de Gestão de Serviços
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/servico">Serviços</a></li>
        <li class="active">Gestão de Serviços</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
           <a class=" col-lg-offset-5 btn btn-success" href="{{route('servico.create')}}">Novo Serviço</a> 
            
          <div class="box-tools pull-right">
            @include('includes.message')
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
         <div class="box-body">
         <div class="box">
            <div class="box-header">

              <h3 class="box-title">Gestão de Serviços</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nº de Ordem</th>
                  <th>Descrição do Serviço</th>
                  <th>Editar</th>
                  <th>Apagar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($servico as $serv)
                  <tr>
                  <td>{{$loop->index +1}}</td>
                  <td>{{$serv->descricao}}
                  </td>
                 <td style="text-align: center;"><a href="{{route('servico.edit',$serv->id)}}"><i class="fa fa-edit"></i></a> </td>
                  <td style="text-align: center;">
                  <form id="delete-form-{{$serv->id}}" method="post" action="{{route('servico.destroy',$serv->id)}}" style="display: none">
                  {{ csrf_field()}}
                  {{ method_field('DELETE')}}
                    
                  </form>
                  <a href="" onClick="
                  if(confirm('Tem certeza que deseja apagar?'))
                  {
                  event.preventDefault();
                  document.getElementById('delete-form-{{$serv->id}}').submit();
                  }
                  else{
                  event.preventDefault();}">
                  <i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nº de Ordem</th>
                  <th>Descrição do Serviço</th>
                  <th>Editar</th>
                  <th>Apagar</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
@section('footerSection')

<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>

  $(function (){

    $("#example1").DataTable();
    $("#example2").DataTable({
      "paging":true,
      "lengthChange":false,
      "searching":false,
      "ordering":true,
      "info":true,
      "autoWidth":false
    });

  });
</script>
@endsection