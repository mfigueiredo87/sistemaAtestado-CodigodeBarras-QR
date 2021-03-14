<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\custo_servico;
use App\Models\Admin\servico;
use App\Models\Admin\custo;

class CustoServicoController extends Controller
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
        $custo_servico = custo_servico::all();
        $servico = servico::all();
        $custo = custo::all();
         return view('admin.custo_servico.index',compact('custo_servico','servico','custo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $servico = servico::all();
        $custo = custo::all();
          return view('admin.custo_servico.create',compact('servico','custo'));
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
            'valor'=>'required',
            'servico'=>'required'
        ]);

        //return $request->all();

        $custo_servico= new custo_servico;
        $custo_servico->custo_id = $request->valor;
        $custo_servico->servico_id = $request->servico;
        $custo_servico->save();
        return redirect(route('custo_servico.index'))->with('message','Operação realizada com sucesso.');
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
        $servico = servico::all();
        $custo = custo::all();
        $custo_servico = custo_servico::find($id);
        return view('admin.custo_servico.edit',compact('custo_servico','servico','custo'));
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
            'valor'=>'required'
        ]);

        $custo_servico = custo_servico::find($id);
        $custo_servico->custo_id = $request->valor;
        $custo_servico->servico_id = $request->servico;
        $custo_servico->save();

        return redirect(route('custo_servico.index'))->with('message','Informação actualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        custo_servico::where('id',$id)->delete();
        return redirect()->back()->with('msg_del','Operação concluida com sucesso.');
    }
}
