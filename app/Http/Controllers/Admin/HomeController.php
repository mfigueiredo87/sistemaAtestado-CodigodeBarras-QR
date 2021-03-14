<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\direcao;
use App\Models\Admin\admin;
use App\Models\Admin\servico;
use App\Models\Admin\efeito;
use App\Models\Admin\documento;

class HomeController extends Controller
{
    //
    	    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function home(){

        $users = admin::count();
        $direcao = direcao::count();
        $servico = servico::count();
        $documento = documento::count();

    	return view('admin/home',compact('users','direcao','servico','documento'));
    }
}
