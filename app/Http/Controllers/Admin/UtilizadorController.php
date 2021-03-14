<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\admin;

class UtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $users = admin::withTrashed()->get();
        $totaluser = admin::count();
        return view ('admin.utilizador.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.utilizador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'password' => 'required|string|min:6|confirmed',
        'phone'=>'required|numeric',
        'status' => 'required',
        'role' => 'required|in:0,1'
        // 'role'=>'required'
        ]);

              // // para encriptar a password
       $request['password'] = bcrypt($request->password);

       $user = admin::create($request->all());
      
       return redirect(route('utilizador.index'))->with('message','Utilizador Registado com Sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = admin::find($id);
        return view('admin.utilizador.newpass',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $user = admin::find($id);
        return view('admin.utilizador.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
       'name' => 'required|string|max:255',
       'email' => 'required|string|email|max:255',
       // 'password' => 'required|string|min:6|confirmed',
        'phone'=>'required|numeric',
        // 'status' => 'required'
        // 'senha_actual'=>'required'
        ]);

        $request->status? : $request['status']=1; //verifica se o status esta vazio, apos o sinal de interrogacao deixa-se espaco significando true e depois do : significa false.

        $request['password'] = bcrypt($request->password);
        $user = admin::where('id',$id)->update($request->except('_token','_method','senha_actual','password_confirmation'));
        return redirect(route('admin.home'))->with('message','Dados alterados com Sucesso.');
        // // alterar a senha
        // $admin = admin::find($id);
        // if ($request->input('senha_actual') = $admin->password) {

        //         // // para encriptar a password
        //     $request['password'] = bcrypt($request->password);
        //     $user = admin::where('id',$id)->update($request->except('_token','_method','senha_actual','password_confirmation'));
        // return redirect(route('admin.home'))->with('message','Dados alterados com Sucesso.');
        //        }else{
        //      return redirect(route('admin.home'))->with('msg_del','A senha ACTUAL inserida não corresponde com a existente na Base de Dados. Tente novamente.');
    
        // }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        admin::where('id',$id)->delete();
        return redirect()->back()->with('msg_del','Utilizador desactivado com sucesso.');
    }

      public function restore($id){
       
        admin::withTrashed()->find($id)->restore();//para restaurar o projecto dado como eliminado 
                
      return redirect()->back()->with('msg_rest','Utilizador restaurado com sucesso.');

    }
}
