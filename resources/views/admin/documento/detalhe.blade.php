@extends('admin/layouts/app')

@section('headSection')

<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bem vindo a página de Atestados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/documento">Documentos</a></li>
        <li class="active">Gestão de Atestados</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
    
          <a class=" col-lg-offset-5 btn btn-success" href="{{route('documento.create')}}">Novo Atestado</a> 
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
              <h3 class="box-title">Gestão de Atestados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nº</th>
                  <th>Nome</th>
                  <th>Cod. Validação</th>
                  <th>Nº Bilhete</th>
                  <th>Tipo</th>
                  <th>Efeito</th>
                  <th>Atendido por</th>
                  <th>Data de Emissão</th>
                  <th>Opções</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($documento as $atestado)
                  <tr>
                  <td>{{$loop->index +1}}</td>
                  <td>{{$atestado->nome}}</td>
                  <td>{{$atestado->codValidacao}}</td>
                  <td>{{$atestado->bilhete}}</td>
                  <td>{{$atestado->tipo->descricao}}</td>
                  <td>{{$atestado->efeito->nome}}</td>
                  <td>{{$atestado->utilizador->name}}</td>
                  <td>{{$atestado->created_at->toFormattedDateString()}}</td>
              <td>
                       
              <!--   <a href="/documento/{{$atestado->id}}/visualizar"  title="Restaurar">
                <span class="fa fa-unlock" style="color:red;" ></span>
                </a>  &nbsp&nbsp; -->
               <!-- <a href="{{route('documento.show',$atestado->id)}}"><i class="fa fa-print"></i></a> &nbsp&nbsp; -->
              <a href="{{route('documento.edit',$atestado->id)}}"><i class="fa fa-edit"></i></a> &nbsp&nbsp;
                <!--  <form id="delete-form-{{$atestado->id}}" method="post" action="{{route('documento.destroy',$atestado->id)}}" style="display: none">
                  {{ csrf_field()}}
                  {{ method_field('DELETE')}}
                  </form>
            
                  <a href="" class="" onClick="
                  if(confirm('Tem certeza que deseja Inactivar?'))
                  {
                  event.preventDefault();
                  document.getElementById('delete-form-{{$atestado->id}}').submit();
                  }
                  else{
                  event.preventDefault();}">
                  <i class="fa fa-trash"></i></a> -->
               
              </td>
              
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th>Nº</th>
                  <th>Nome</th>
                  <th>Cod. Validação</th>
                  <th>Nº Bilhete</th>
                  <th>Tipo</th>
                  <th>Efeito</th>
                  <th>Atendido por</th>
                  <th>Data de Emissão</th>
                  <th>Opções</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
     
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
@section('footerSection')
<!-- <script src="{{asset('admin/plugins/datatables/js/dataTables.jqueryui.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/js/jquery.dataTables.js')}}"></script> -->
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