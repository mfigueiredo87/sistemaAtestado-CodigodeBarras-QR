<?php

Route::group(['namespace' => 'User'], function(){
	Route::get('/', 'HomeController@index');
	// Route::get('/post/{post}','PostController@post')->name('post');
	// Route::get('tag','Tag\Controller@index')->name('tag');
	//
	Route::get('mensagem','MensagemController@index')->name('mensagem');
});


//Admin Routes
// Route::group(['middleware' => 'admin','namespace'=>'Admin'], function(){
// Route::group(['namespace' => 'Admin','middleware'=>'auth:admin'], function(){
 Route::group(['namespace' => 'Admin'], function(){
	//rota para home
	Route::get('admin/home', 'HomeController@home')->name('admin.home');
	//rota para cargo
	Route::resource('admin/cargo', 'CargoController');
	//rota para custo
	Route::resource('admin/custo', 'CustoController');
	//rota para custo
	Route::resource('admin/custo_servico', 'CustoServicoController');
	//rota para direcao
	Route::resource('admin/direcao', 'DireccaoController');
	Route::get('/direcao/{id}/restaurar', 'DireccaoController@restore');
	//rota para utilizador
	Route::resource('admin/utilizador', 'UtilizadorController');//rota para documento
	Route::get('/utilizador/{id}/restaurar', 'UtilizadorController@restore');
	Route::get('/utilizador/newpass/{id}', 'UtilizadorController@show');


	Route::resource('admin/documento', 'DocumentoController');
	Route::get('/documento/detalhe', 'DocumentoController@detalhe');

	// Route::get('/users/report/{view_type}', 'UserController@report');
	//para efeito
	Route::resource('admin/efeito', 'EfeitoController');
	//rota para estado
	Route::resource('admin/estado', 'EstadoDocumentoController');

	//rota para servico
	Route::resource('admin/servico', 'ServicoController');
	//rota para estado
	Route::resource('admin/tipo', 'TipoDocumentoController');
//rota para sobre
	Route::resource('admin/sobre', 'SobreController');

	//admin Auth routes
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login','Auth\LoginController@login');
});


 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('admin.login');
});

