  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Sistema de Gestão de Atestados</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIG-Atestados</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Navegação</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!--  <img src="dist/img/aml1.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <!--  <img src="dist/img/aml1.jpg" class="img-circle" alt="User Image">
 -->
                <p>
                    Detalhes: {{Auth::user()->email}}
                  <small>Registado em: {{Auth::user()->created_at->toFormattedDateString()}}</small>
                </p>
              </li>
     
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/utilizador/newpass/{{Auth::user()->id}}" class="btn btn-default btn-flat">Alterar Semha</a>
                </div>

                <div class="btn btn-default pull-right">
                  <a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                  <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>