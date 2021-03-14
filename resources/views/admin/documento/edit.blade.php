@extends('admin.layouts.app')
@section('headSection')
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/contents.css')}}"> -->
@endsection
@section('main-content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Atestados de Residência
        <small>   Bem vindo a página de Emissão de Atestados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/documento">Atestados</a></li>
        <li class="active">Novo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Atestado</h3>
            </div>
            <!-- /.box-header -->
            <!-- tratamento dos erros -->
         @include('includes.message')
            <!-- form start -->
            <form role="form" action="{{route('documento.update',$documento->id)}}" method="post" enctype="multipart/form-data">
               {{ csrf_field()}}
                 {{ method_field('PATCH')}}
            <div class="box-body">

                <div class="row col-lg-offset-1">
                   <div class="col-lg-2">
                    <div class="form-group">
                    <label for="codValidacao">Código de Validação</label>
                    <input type="text" class="form-control" id="codValidacao" name="codValidacao" value="{{$documento->codValidacao}}" readonly="">
                  </div>
                  </div>

                  <div class="col-lg-5">
                    <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="title" name="nome" value="{{$documento->nome}}">
                  </div>
                  </div>

                  <div class="form-group col-md-2">
                  <label for="estado_civil">Estado Civil</label>
                  <input type="text" name="estado_civil" class="form-control" value="{{ $documento->estado_civil}}">
                </div>  
              </div>
                
                <div class="row col-lg-offset-1">
                
                <div class="form-group col-md-2">
                  <label for="data_nascimento">Data de Nascimento</label>
                  <input type="date" name="data_nascimento" class="form-control" value="{{ $documento->data_nascimento}}">
                </div> 

                  <div class="form-group col-md-4">
                  <label for="naturalidade">Naturalidade (Município)</label>
                  <input type="text" name="naturalidade" class="form-control" value="{{$documento->naturalidade}}">
                </div> 

                  <div class="form-group col-md-3">
                  <label for="provincia">Província</label>
                  <input type="text" name="provincia" class="form-control" value="{{ $documento->provincia}}">
                </div>

                </div>
               
               <div class="row col-lg-offset-1">
                
                <div class="form-group col-md-3">
                  <label for="nome_pai">Nome do Pai</label>
                  <input type="text" name="nome_pai" class="form-control" value="{{$documento->nome_pai}}">
                </div> 

                  <div class="form-group col-md-3">
                  <label for="nome_mae">Nome da Mãe</label>
                  <input type="text" name="nome_mae" class="form-control" value="{{$documento->nome_mae}}">
                </div> 

                  <div class="form-group col-md-3">
                  <label for="bilhete">Nº de Bilhete</label>
                  <input type="text" name="bilhete" class="form-control" value="{{$documento->bilhete}}">
                </div>
                  
                </div>

                <div class="row col-lg-offset-1">
                
                <div class="form-group col-md-2">
                  <label for="data_emissao">Data de Emissão</label>
                  <input type="date" name="data_emissao" class="form-control" value="{{$documento->data_emissao}}">
                </div> 

                  <div class="form-group col-md-3">
                  <label for="bairro">Bairro</label>
                  <input type="text" name="bairro" class="form-control" value="{{ $documento->bairro}}">
                </div> 

                  <div class="form-group col-md-2">
                  <label for="rua">Rua</label>
                  <input type="text" name="rua" class="form-control" value="{{ $documento->rua}}">
                </div>
                  
                  <div class="form-group col-md-2">
                  <label for="casa">Casa nº</label>
                  <input type="text" name="casa" class="form-control" value="{{$documento->casa}}">
                </div>
                  
                </div>

                <div class="row col-lg-offset-1">
                
                <div class="form-group col-md-3">
                  <label for="residente">Residente (Munícipio)</label>
                  <input type="text" name="residente" class="form-control" value="{{$documento->residente}}">
                </div> 

                  <div class="form-group col-md-3">
                  <label for="validade">Validade do Documento (dias)</label>
                  <input type="text" name="validade" class="form-control" value="{{$documento->validade_documento}}">
                </div> 

                 <div class="form-group col-md-3">
                  <label for="tipo">Tipo do Documento</label>
                    <select class="form-control" name="tipo" id="select-role">
                    <option value="{{$documento->id}}">Actual: {{$documento->tipo->descricao}}</option>
                    @foreach ($servico as $ser)
                  <option value="{{$ser->id}}">{{$ser->descricao}}</option>
                  @endforeach
                </select> 
                </div>

            
                </div>

                <div class="row col-lg-offset-1">
                <div class="form-group col-md-3">
                  <label for="efeito">Efeito do Documento</label>
                    <select class="form-control" name="efeito" id="select-role">
                   <option value="{{$documento->id}}">Actual: {{$documento->efeito->nome}}</option>
                  @foreach ($efeito as $ef)
                  <option value="{{$ef->id}}">{{$ef->nome}}</option>
                  @endforeach
                </select> 
                </div>
                  
               
                  <div class="form-group col-md-3">
                  <label for="Autorizacao">Autorização da Administração</label>
                  <select class="form-control" name="autorizacao" id="select-role">
                    <option value="{{$documento->id}}">Actual: {{$documento->direcao->cargo->descricao}}</option>
                   @foreach ($direcao as $dir)
                  <option value="{{$dir->id}}">{{$dir->cargo->descricao}}</option>
                  @endforeach
                </select>
                 
                 </div>

               <!--   <div class="form-group col-md-3">
                    <div class="checkbox pull-left">
                        <br>
                  <label>
                   <input type="checkbox" name="estado" value="1"> Marque a caixa de verificação para EMITIR o documento
                   </label>
                   <input type="hidden" name="utilizador" value="1">
                  </div>
                 </div> -->

                </div>

                <div class="row col-lg-offset-1">
                <label style="color: red; font-style: bold;">Nota:</label>
                <p style="color: red; font-style: italic;">Todo o documento deve ser autorizado pelo/a Administrador/a Municipal, salvo em casos devidamente autorizados por despacho do titular do poder executivo.</p>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route('documento.index')}}" class="btn btn-warning">Voltar</a>
                </div>
                </div>
                </div>
          
             
            </form>
          </div>
        
        </div>
        
      </div>
       
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('footerSection')
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(document).ready(function(){
    $(".select2").select2();
  });
</script>
@endsection