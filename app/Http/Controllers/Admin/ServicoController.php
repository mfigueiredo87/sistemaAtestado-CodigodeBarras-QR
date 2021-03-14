<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\servico;
class ServicoController extends Controller
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
        $servico = servico::all();
         return view('admin.servico.index',compact('servico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servico.create');
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
            'descricao'=>'required'
        ]);

        $servico= new servico;
        $servico->descricao = $request->descricao;
        $servico->save();
        return redirect(route('servico.index'))->with('message','Serviço registado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $servico = servico::find($id);
        return view('admin.servico.edit',compact('servico'));
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
            'descricao'=>'required'
        ]);

        $servico = servico::find($id);
        $servico->descricao = $request->descricao;
        $servico->save();

        return redirect(route('servico.index'))->with('message','Serviço actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        servico::where('id',$id)->delete();
        return redirect()->back()->with('msg_del','Serviço removido com sucesso.');
    }
}
