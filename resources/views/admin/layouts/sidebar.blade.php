 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="{{asset('admin/dist/img/aml1.jpg')}}" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="{{route('admin.home')}}"><i class="fa fa-circle text-success"></i>Bem vindo</a>
        </div>
      </div>
 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @if(auth()->check())
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Atestados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route('documento.create')}}"><i class="fa fa-keyboard-o"></i> Emitir</a></li>
            <li><a href="{{route('documento.index')}}"><i class="fa fa-eye"></i> Ver</a></li>
             <li class="active"><a href="/documento/detalhe"><i class="fa fa-file-text"></i> Detalhes </a></li> 
         
          </ul>
        </li>
        @if (auth()->user()->is_admin)
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Configurações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
             
            <li class="active">
            <li class="active"><a href="{{ route('custo.index')}}"><i class="fa fa-money"></i> Custos </a></li>
            <li class="active"><a href="{{ route('servico.index')}}"><i class="fa fa-caret-square-o-right"></i> Serviços Disponíveis</a></li>
            <li class="active"><a href="{{ route('custo_servico.index')}}"><i class="fa fa-caret-square-o-right"></i> Custos por Serviços</a></li>
             <li class="active"><a href="{{ route('efeito.index')}}"><i class="fa fa-file-o"></i> Efeitos Documentos </a></li>
              
             <!-- <li class="active"><a href="{{ route('tipo.index')}}"><i class="fa fa-paper-plane"></i> Tipo de Documentos </a></li>  -->

          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="fa fa-user-o"></i>
            <span>Gerir Utilizadores</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('cargo.index')}}"><i class="fa fa-briefcase"></i> Cargos </a></li>
            <li><a href="{{ route('direcao.index')}}"><i class="fa fa-user"></i> Direcção </a></li>
            <li><a href="{{ route('utilizador.index')}}"><i class="fa fa-user-plus"></i> Utilizadores</a></li>
          </ul>
        </li>
         @endif
         @endif
        <li>
          <a href="{{route('sobre.index')}}">
            <i class="fa  fa-hand-o-right"></i> <span>Sobre</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Autor</small>
            </span>
          </a>
        </li>
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

