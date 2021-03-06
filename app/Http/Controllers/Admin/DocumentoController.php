<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\direcao;
use App\Models\Admin\admin;
use App\Models\Admin\servico;
use App\Models\Admin\efeito;
use App\Models\Admin\documento;
use PDF;

class DocumentoController extends Controller
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
            $documento = documento::all();
          
         return view('admin.documento.index',compact('documento'));
    }

     public function detalhe()
    {
            $documento = documento::all();
          
         return view('admin.documento.detalhe',compact('documento'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $efeito = efeito::all();
        $servico = servico::all();
        $direcao = direcao::all();

           return view('admin.documento.create',compact('efeito','servico','direcao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'codValidacao' =>'required|max:255|unique:documentos',
            'nome' =>'required|max:255',
            'estado_civil' =>'required|max:30',
            'data_nascimento'=>'required',
            'nome_pai'=>'required|min:1',
            'nome_mae' =>'required|min:1',
            'naturalidade' =>'required|min:1',
            'provincia' =>'required|min:1',
            'bilhete' =>'required|min:1|unique:documentos',
            'data_emissao' =>'required|min:1',
            'bairro' =>'required|min:1',
            'rua' =>'required|min:1',
            'casa' =>'required|min:1',
            'residente' =>'required|min:1',
            'validade' =>'required|min:1',
            'tipo' =>'required|min:1',
            'efeito' =>'required|min:1',
            'autorizacao' =>'required|min:1'
            
            
        ];
        
        $messages=[
            'codValidacao.required'=>'Este campo ?? de preenchimento obrigat??rio.',
            'nome.required'=>' O Campo Nome ?? de preenchimento obrigat??rio.',
            'nome.max'=>' O Campo nome ?? demasiado curto.',
            'estado_civil.required'=>'O Campo Estado Civil ?? de preenchimento obrigat??rio.',
            'data_nascimento.required'=>'O Campo Data de Nascimento ?? de preenchimento obrigat??rio.',
            'nome_pai.required'=>'O Campo Nome do Pai ?? de preenchimento obrigat??rio.',
            'nome_mae.required'=>'O Campo  Nome da M??e ?? de preenchimento obrigat??rio.',
            'naturalidade.required'=>'O Campo Naturalidade ?? de preenchimento obrigat??rio.',
            'provincia.required'=>'O Campo Prov??ncia ?? de preenchimento obrigat??rio.',
            'bilhete.unique'=>'N??o deve existir 2 ou mais solicitantes com o mesmo n??mero de Bilhete. Verifique o n??mero do Bilhete',
            'bilhete.required'=>'Campo Bilhete ?? de preenchimento obrigat??rio.',
            'data_emissao.required'=>'O Campo Data de Emiss??o ?? de preenchimento obrigat??rio.',
            'bairro.required'=>'O Campo Bairro ?? de preenchimento obrigat??rio.',
            'rua.required'=>'O Campo Rua ?? de preenchimento obrigat??rio.',
            'casa.required'=>'O Campo Casa ?? de preenchimento obrigat??rio.',
            'municipio_residente.required'=>'O Campo Munic??pio de Residencia ?? de preenchimento obrigat??rio.',
            'tipo.required'=>'O Campo Tipo de Documento ?? de preenchimento obrigat??rio.',
            'efeito.required'=>'O Campo Efeito do Documento ?? de preenchimento obrigat??rio.',
            'validade.required'=>'O Campo Validade do documento ?? de preenchimento obrigat??rio.',
            'autorizacao.required'=>'O Campo Autoriza????o do documento ?? de preenchimento obrigat??rio.'
            
        ];

        $this->validate($request, $rules, $messages);

        $documento = new documento;
        $documento->codValidacao = $request->codValidacao;
        $documento->nome = $request->nome;
        $documento->estado_civil = $request->estado_civil;
        $documento->data_nascimento = $request->data_nascimento;
        $documento->nome_pai = $request->nome_pai;
        $documento->nome_mae = $request->nome_mae;
        $documento->naturalidade = $request->naturalidade;
        $documento->provincia = $request->provincia;
        $documento->bilhete = $request->bilhete;
        $documento->data_emissao = $request->data_emissao;
        $documento->bairro = $request->bairro;
        $documento->rua = $request->rua;
        $documento->casa = $request->casa;
        $documento->residente = $request->residente;
        $documento->validade_documento = $request->validade;
        $documento->tipo_id = $request->tipo;
        $documento->efeito_id = $request->efeito;
        $documento->direcao_id = $request->autorizacao;
        $documento->utilizador_id = auth()->user()->id;
       
        $documento->save();

         

        return redirect(route('documento.index'))->with('message','Documento emitido com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $efeito = efeito::all();
        $servico = servico::all();
        $direcao = direcao::all();
        $documentos = documento::find($id);

        // $pdf = PDF::loadView('admin.documento.ver', compact('documentos'));
        //   return $pdf->setPaper('a4', 'portrait')->stream('AtestadoResidencia.pdf');

        //  if($request->view_type === 'download') {
        //     $pdf = PDF::loadView('admin.documento.ver', ['documentos' => $documentos]);
        //     return $pdf->download('atestado.pdf');
        // } else {
        //     $view = View('admin.documento.ver', ['documentos' => $documentos]);
        //     $pdf = \App::make('dompdf.wrapper');
        //     $pdf->loadHTML($view->render());
        //     return $pdf->stream();
        // }
        

        return view('admin.documento.ver',compact('documentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $efeito = efeito::all();
        $servico = servico::all();
        $direcao = direcao::all();
        $documento = documento::find($id);


        return view('admin.documento.edit',compact('documento','servico','efeito','direcao'));
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
         $rules=[
            // 'codValidacao' =>'required|max:255',
            'nome' =>'required|max:255',
            'estado_civil' =>'required|max:30',
            'data_nascimento'=>'required',
            'nome_pai'=>'required|min:1',
            'nome_mae' =>'required|min:1',
            'naturalidade' =>'required|min:1',
            'provincia' =>'required|min:1',
            // 'bilhete' =>'required|min:1|unique:documentos',
            'data_emissao' =>'required|min:1',
            'bairro' =>'required|min:1',
            'rua' =>'required|min:1',
            'casa' =>'required|min:1',
            'residente' =>'required|min:1',
            'validade' =>'required|min:1',
            'tipo' =>'required|min:1',
            'efeito' =>'required|min:1',
            'autorizacao' =>'required|min:1'
            
            
        ];
        
        $messages=[
            // 'codValidacao.required'=>'Este campo ?? de preenchimento obrigat??rio.',
            'nome.required'=>' O Campo Nome ?? de preenchimento obrigat??rio.',
            'nome.max'=>' O Campo nome ?? demasiado curto.',
            'estado_civil.required'=>'O Campo Estado Civil ?? de preenchimento obrigat??rio.',
            'data_nascimento.required'=>'O Campo Data de Nascimento ?? de preenchimento obrigat??rio.',
            'nome_pai.required'=>'O Campo Nome do Pai ?? de preenchimento obrigat??rio.',
            'nome_mae.required'=>'O Campo  Nome da M??e ?? de preenchimento obrigat??rio.',
            'naturalidade.required'=>'O Campo Naturalidade ?? de preenchimento obrigat??rio.',
            'provincia.required'=>'O Campo Prov??ncia ?? de preenchimento obrigat??rio.',
            'bilhete.unique'=>'N??o deve existir 2 ou mais solicitantes com o mesmo n??mero de Bilhete. Verifique o n??mero do Bilhete',
            'bilhete.required'=>'Campo Bilhete ?? de preenchimento obrigat??rio.',
            'data_emissao.required'=>'O Campo Data de Emiss??o ?? de preenchimento obrigat??rio.',
            'bairro.required'=>'O Campo Bairro ?? de preenchimento obrigat??rio.',
            'rua.required'=>'O Campo Rua ?? de preenchimento obrigat??rio.',
            'casa.required'=>'O Campo Casa ?? de preenchimento obrigat??rio.',
            'municipio_residente.required'=>'O Campo Munic??pio de Residencia ?? de preenchimento obrigat??rio.',
            'tipo.required'=>'O Campo Tipo de Documento ?? de preenchimento obrigat??rio.',
            'efeito.required'=>'O Campo Efeito do Documento ?? de preenchimento obrigat??rio.',
            'validade.required'=>'O Campo Validade do documento ?? de preenchimento obrigat??rio.',
            'autorizacao.required'=>'O Campo Autoriza????o do documento ?? de preenchimento obrigat??rio.'
            
        ];

        $this->validate($request, $rules, $messages);

        $documento = documento::find($id);
        // $documento->codValidacao = $request->codValidacao;
        $documento->nome = $request->nome;
        $documento->estado_civil = $request->estado_civil;
        $documento->data_nascimento = $request->data_nascimento;
        $documento->nome_pai = $request->nome_pai;
        $documento->nome_mae = $request->nome_mae;
        $documento->naturalidade = $request->naturalidade;
        $documento->provincia = $request->provincia;
        $documento->bilhete = $request->bilhete;
        $documento->data_emissao = $request->data_emissao;
        $documento->bairro = $request->bairro;
        $documento->rua = $request->rua;
        $documento->casa = $request->casa;
        $documento->residente = $request->residente;
        $documento->validade_documento = $request->validade;
        $documento->tipo_id = $request->tipo;
        $documento->efeito_id = $request->efeito;
        $documento->direcao_id = $request->autorizacao;
        $documento->utilizador_id = auth()->user()->id;
       
        $documento->update();

        return redirect(route('documento.index'))->with('message','Documento actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        documento::where('id',$id)->delete();
        return redirect()->back()->with('msg_del','Documento desactivado com sucesso.');
    }

      public function restore($id){
       
        documento::withTrashed()->find($id)->restore();//para restaurar o projecto dado como eliminado 
                
      return redirect()->back()->with('msg_rest','Documento restaurado com sucesso.');

    }
}