@extends('admin/layouts/app')
@section('headSection')

<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bem vindo a página de Gestão de Membros de Direcção
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/direcao">Direcção</a></li>
        <li class="active">Gestão de Membros de Direcção</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
           <a class=" col-lg-offset-5 btn btn-success" href="{{route('direcao.create')}}">Novo Membro</a> 
            
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

              <h3 class="box-title">Gestão de Membros de Direção</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nº de Ordem</th>
                  <th>Nome</th>
                  <th>Nº Bilhete</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Estado</th>
                  <th>Cargo</th>
                  <th>Opções</th>
                  <!-- <th>Apagar</th> -->
                </tr>
                </thead>
                <tbody class="restaurado">

                @foreach ($direcao as $dir)
                 
            <!--      @if ($dir->deleted_at !='NULL')
                  <style>
                   .restaurado{
                      color:red;
                    }
                  </style>
                  @else
                   <style>
                    .restaurado{
                      color:#fff;
                    }
                  </style>
                 
                 @endif -->
                  <tr>
                  <td>{{$loop->index +1}}</td>
                  <td>{{$dir->nome}}</td>
                  <td>{{$dir->bilhete}}</td>
                  <td>{{$dir->email}}</td>
                  <td>{{$dir->telefone}}</td>
                  <td>{{$dir->estado}}</td>
                  <td>{{$dir->cargo->descricao}}
                  </td>
                  <td>
                  @if ($dir->trashed())
                <a href="/direcao/{{$dir->id}}/restaurar"  title="Restaurar">
                <span class="fa fa-unlock" style="color:red;" ></span>
                </a>  &nbsp&nbsp;
                @else
              <a href="{{route('direcao.edit',$dir->id)}}"><i class="fa fa-edit"></i></a> &nbsp&nbsp;
                 <form id="delete-form-{{$dir->id}}" method="post" action="{{route('direcao.destroy',$dir->id)}}" style="display: none">
                  {{ csrf_field()}}
                  {{ method_field('DELETE')}}
                  </form>
            
                  <a href="" class="" onClick="
                  if(confirm('Tem certeza que deseja Inactivar?'))
                  {
                  event.preventDefault();
                  document.getElementById('delete-form-{{$dir->id}}').submit();
                  }
                  else{
                  event.preventDefault();}">
                  <i class="fa fa-trash"></i></a>
                @endif
                </td>
                </tr>
              
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Nº de Ordem</th>
                  <th>Nome</th>
                  <th>Nº Bilhete</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Estado</th>
                  <th>Cargo</th>
                  <th>Opções</th>
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