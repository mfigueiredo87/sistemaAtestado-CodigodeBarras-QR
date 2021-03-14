<!DOCTYPE html>
<html lang="pt-br">
<head>
	 @include('admin.layouts.head')
</head>

<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper">
	@include('admin.layouts.header')

	@include('admin.layouts.sidebar')

	@section('main-content')
		@show
	
	@include('admin.layouts.footer')

	@include('admin.layouts.grafico')
	
</div>
</body>
</html>