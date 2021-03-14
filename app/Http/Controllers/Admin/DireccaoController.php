<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\direcao;
use App\Models\Admin\cargo;

class DireccaoController extends Controller
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
        $direcao = direcao::withTrashed()->get();
        //$direcao = Direcao::paginate(4);
        return view('admin.direcao.index')->with(compact('direcao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $cargo = cargo::all();
         return view('admin.direcao.create', compact('cargo'));
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
            'nome' =>'required|max:255',
            'bilhete'=>'required|max:30|unique:direcaos',
            'email' =>'required|email|max:255',
            'telefone'=>'required|numeric',
            'estado'=>'required|max:200',
            'cargo_id'=>'required|max:10'
        ]);

        // direcao::find($id)->update($request->all());

        $direcao = new direcao;
        $direcao->nome = $request->nome;
        $direcao->bilhete = $request->bilhete;
        $direcao->email = $request->email;
        $direcao->telefone = $request->telefone;
        $direcao->estado = $request->estado;
        $direcao->cargo_id = $request->cargo_id;
        $direcao->save();

        // $this->validate($request, direcao::$rules, direcao::$messages);
        // direcao::create($request->all());

        return redirect(route('direcao.index'))->with('message','Membro registado com sucesso.');
       
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
        $cargo = cargo::all();
        $direcao = direcao::find($id);
        return view('admin.direcao.edit',compact('direcao','cargo'));
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
          // $direcao = direcao::find($id);

         $rules =[
            'nome' =>'required|max:255',
            'email' =>'required|email|max:255',
            'telefone'=>'required|numeric',
            'estado'=>'required|max:200',
            'cargo_id'=>'required|max:10'
        ];

        $messages = [
            'nome.required'=>' Preencha o campo nome de Membro.',
            'nome.max'=>' O nome é demasiado curto.',
            'email.required'=>'O preenchimento do campo e-mail é obrigatório.',
            'email.email'=>'O e-mail inserido não é válido.',
            'email.max'=>'O e-mail inserido é demasido extenso.',
            'telefone.required'=>'O preenchimento do campo telefone é obrigatório.',
            'estado.required'=>'O preenchimento do campo estado é obrigatório.',
            'telefone.min'=>'O campo telefone deve conter no minimo 9 caracteres.',
            'telefone.numeric'=>'Este campo aceita somente valores numericos (0-9).',
            'cargo_id.required'=>'O campo cargo é de preenchimento obrigatório.',
            'cargo_id.max'=>'O cargo é demasiado curto.'
        ];

        $this->validate($request, $rules, $messages);

        $direcao = direcao::find($id);
        $direcao->nome = $request->input('nome');
        $direcao->email = $request->input('email');
        $direcao->telefone = $request->input('telefone');
        $direcao->estado = $request->input('estado');
        $direcao->cargo_id = $request->input('cargo_id');
        $direcao->update();

         return redirect(route('direcao.index'))->with('message','Membro actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        direcao::where('id',$id)->delete();
        return redirect()->back()->with('msg_del','Membro desactivado com sucesso.');
    }

      public function restore($id){
       
        direcao::withTrashed()->find($id)->restore();//para restaurar o projecto dado como eliminado 
                
      return redirect()->back()->with('msg_rest','Membro restaurado com sucesso.');

    }
}
