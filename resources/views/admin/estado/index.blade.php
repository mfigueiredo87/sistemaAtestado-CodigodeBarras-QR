@extends('admin/layouts/app')
@section('headSection')

<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bem vindo a página de Gestão de Custos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/custo">Custos</a></li>
        <li class="active">Gestão de Custos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
           <a class=" col-lg-offset-5 btn btn-success" href="{{route('estado.create')}}">Novo Custo</a> 
            
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

              <h3 class="box-title">Gestão de Custos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nº</th>
                  <th>Documento</th>
                  <th>Beneficiário</th>
                  <th>Estado</th>
                  <th>Emitido por</th>
                  <th>Editar</th>
                  <th>Apagar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($documento as $doc)
                  <tr>
                  <td>{{$loop->index +1}}</td>
                  <td>{{$doc->valor}},00
                  </td>
                 <td style="text-align: center;"><a href="{{route('estado.edit',$doc->id)}}"><i class="fa fa-edit"></i></a> </td>
                  <td style="text-align: center;">
                  <form id="delete-form-{{$doc->id}}" method="post" action="{{route('estado.destroy',$doc->id)}}" style="display: none">
                  {{ csrf_field()}}
                  {{ method_field('DELETE')}}
                    
                  </form>
                  <a href="" onClick="
                  if(confirm('Tem certeza que deseja apagar?'))
                  {
                  event.preventDefault();
                  document.getElementById('delete-form-{{$doc->id}}').submit();
                  }
                  else{
                  event.preventDefault();}">
                  <i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Nº</th>
                  <th>Documento</th>
                  <th>Beneficiário</th>
                  <th>Estado</th>
                  <th>Emitido por</th>
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