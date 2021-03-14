<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIG-ATESTADOS</title>
  <!-- Tell the browser to be responsive to screen width -->
   
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{('asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<div class="row">
  <div class="col-lg-offset-2 col-md-9">
          <div class="box" >
            <br>
            <div class="box-body">
               <p style="margin-top: 1px; font-weight: bold; text-transform: uppercase; text-align: center;" class="pull-left"><img src="{{asset('admin/dist/img/logo.jpg')}}" width="20%" alt="Logotipo"><br>República de Angola <br> Governo Provincial da Huíla <br> Administração Municipal do Lubango <br> (Secretaria)</p> <br>
               <span class="mailbox-read-time pull-right"><br><img src="{{asset('admin/dist/img/aml1.jpg')}}" width="40%" alt="Logotipo"></span>
            </div>
            <div class="box-body no-padding">
              <hr style="size:2px;">
              <div class="mailbox-controls text-center">
               <h4 style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 18px;">

                {{$documentos->tipo->descricao}} nº AML00{{$documentos->numero}} /{{date('Y')}}</h4>
                
              </div>
              
              <div class="mailbox-read-message text-justify">
                <p>Doutor <span style="text-transform: uppercase;">{{$documentos->direcao->nome}}</span>, Administrador Municipal do Lubango, ATESTA que <span style="text-transform: uppercase;"> {{$documentos->nome}}</span>, {{$documentos->estado_civil}}, nascido (a) aos {{$documentos->data_nascimento}}, filho (a) de {{$documentos->nome_pai}} e de {{$documentos->nome_mae}}, natural de {{$documentos->naturalidade}}, província de {{$documentos->provincia}}, portador (a) do Bilhete de Identidade nº {{$documentos->bilhete}}, emitido aos {{$documentos->data_emissao}};</p>
              <p>É residente nesta cidade de {{$documentos->residente}}, Casa nº  {{$documentos->casa}}, Bairro {{$documentos->bairro}}, HÁ MAIS DE UM ANO.</p>

              <p>Este atestado destina-se a: <span style="text-transform: uppercase; font-weight: bold;"> {{$documentos->efeito->nome}}.</span> </p>

              <p> E por ser verdade e me haver sido requerido, mandei passar o resente ATESTADO DE RESIDENCIA, que vai por mim assinado e autenticado com o Carimbo a oleo em uo nesta Administracao</p>
            <br><br>
            <p style="text-align: center;">ADMINISTRAÇÃO MUNICIPAL DO LUBANGO, {{date ('d-m-Y H:i:s')}}</p>
      <br><br>

      <p style="text-transform: uppercase; text-align: center; ">POR DELEGAÇÃO DE COMPETÊNCIAS <br><br>O CHEFE DE SERCRETARIA <br><br> _________________________________</p>

      <br>
      <br>
      <br>
      <br>

      <span style="font-weight: bold; font-style: italic;">Cod. Validação: {{$documentos->codValidacao}}</span>
 
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            
            <div class="footer">
              <div class="text-center">
                <hr>
                <p>Rua Dr. António Agostinho Neto nº <br> Caixa Postal nº <br> Telefone: <br> E-mail:i <br>Lubango - Angola</p>
                <br>
              </div>
               
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
  </div>

<!-- jQuery 3 -->
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
