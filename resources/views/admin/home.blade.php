@extends('admin/layouts/app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Página Principal
        <small>
   
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Início</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Dashoboard -->
       @if(auth()->check())
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$servico}}</h3>

              <p>Serviços Disponíveis</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-gear-outline"></i>
            </div>
             @if (auth()->user()->is_admin)
            <a href="{{route('servico.index')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>@endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$documento}}</h3>

              <p>Documentos Emitidos</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="{{route('documento.index')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>Utilizadores Registados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
             @if (auth()->user()->is_admin)
            <a href="{{route('utilizador.index')}}" class="small-box-footer">Mais informações<i class="fa fa-arrow-circle-right"></i></a>@endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$direcao}}</h3>

              <p>Membros de Direcção</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people-outline"></i>
            </div>
             @if (auth()->user()->is_admin)
            <a href="{{route('direcao.index')}}" class="small-box-footer">Mais informações<i class="fa fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
        <!-- ./col -->
      </div>
      @endif
      <!-- Fim do dashoboard -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Gráfico</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Gráfico - Documentos emitidos</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px; width: 816px;" width="1020" height="225"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Notas Importantes</strong>
                  </p>

                  <!-- calendario -->
            <div class="box box-solid bg-green-gradient">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendário</h3>
           
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style=""><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">January 2019</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1546128000000">30</td><td class="old day" data-date="1546214400000">31</td><td class="day" data-date="1546300800000">1</td><td class="day" data-date="1546387200000">2</td><td class="day" data-date="1546473600000">3</td><td class="day" data-date="1546560000000">4</td><td class="day" data-date="1546646400000">5</td></tr><tr><td class="day" data-date="1546732800000">6</td><td class="day" data-date="1546819200000">7</td><td class="day" data-date="1546905600000">8</td><td class="day" data-date="1546992000000">9</td><td class="day" data-date="1547078400000">10</td><td class="day" data-date="1547164800000">11</td><td class="day" data-date="1547251200000">12</td></tr><tr><td class="day" data-date="1547337600000">13</td><td class="day" data-date="1547424000000">14</td><td class="day" data-date="1547510400000">15</td><td class="day" data-date="1547596800000">16</td><td class="day" data-date="1547683200000">17</td><td class="day" data-date="1547769600000">18</td><td class="day" data-date="1547856000000">19</td></tr><tr><td class="day" data-date="1547942400000">20</td><td class="day" data-date="1548028800000">21</td><td class="day" data-date="1548115200000">22</td><td class="day" data-date="1548201600000">23</td><td class="day" data-date="1548288000000">24</td><td class="day" data-date="1548374400000">25</td><td class="day" data-date="1548460800000">26</td></tr><tr><td class="day" data-date="1548547200000">27</td><td class="day" data-date="1548633600000">28</td><td class="day" data-date="1548720000000">29</td><td class="day" data-date="1548806400000">30</td><td class="day" data-date="1548892800000">31</td><td class="new day" data-date="1548979200000">1</td><td class="new day" data-date="1549065600000">2</td></tr><tr><td class="new day" data-date="1549152000000">3</td><td class="new day" data-date="1549238400000">4</td><td class="new day" data-date="1549324800000">5</td><td class="new day" data-date="1549411200000">6</td><td class="new day" data-date="1549497600000">7</td><td class="new day" data-date="1549584000000">8</td><td class="new day" data-date="1549670400000">9</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2019</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month focused">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year focused">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade focused">2010</span><span class="decade">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
            </div>
        
          </div>
                  <!-- fim do calendario -->
                 
              
                </div>
                <!-- /.col -->
              </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          @include('includes.message')
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection