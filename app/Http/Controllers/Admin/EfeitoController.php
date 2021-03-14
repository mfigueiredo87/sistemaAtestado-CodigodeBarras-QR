<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\efeito;
class EfeitoController extends Controller
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
       $efeito = efeito::all();
         return view('admin.efeito.index',compact('efeito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.efeito.create');
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
            'nome'=>'required'
        ]);

        $efeito= new efeito;
        $efeito->nome = $request->nome;
        $efeito->save();
        return redirect(route('efeito.index'))->with('message','Efeito registado com sucesso.');
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
          $efeito = efeito::find($id);
        return view('admin.efeito.edit',compact('efeito'));
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
            'nome'=>'required'
        ]);

        $efeito = efeito::find($id);
        $efeito->nome = $request->nome;
        $efeito->save();

        return redirect(route('efeito.index'))->with('message','Efeito actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       efeito::where('id',$id)->delete();
        return redirect()->back()->with('msg_del','Efeito removido com sucesso.');
    }
}
