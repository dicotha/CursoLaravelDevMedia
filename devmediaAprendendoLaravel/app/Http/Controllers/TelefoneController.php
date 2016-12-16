<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TelefoneRequest;

class TelefoneController extends Controller
{
    
   //função para segurança do projeto, acesso apenas com login.
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function adicionar($id){
    	$cliente = \App\Cliente::find($id);
    	return view('telefones.adicionar', compact('cliente'));
    }
    public function salvar(TelefoneRequest $request,$id){
    	
    	$telefone = new \App\Telefone;
    	$telefone->titulo = $request->input('titulo');
    	$telefone->telefone = $request->input('telefone');
		\App\Cliente::find($id)->addTelefone($telefone);
		\Session::flash('flash_message',[
            'msg'=>'Telefone Adicionado com Sucesso',
            'class'=>'alert-success'
        ]);
        return redirect()->route('clientes.detalhe',$id);
    }

    //tela de edição
    public function editar($id){
        $telefone=\App\Telefone::find($id);
            if(!$telefone){
             \Session::flash('flash_message',[
                'msg'=>'Telefone não encontrado',
                'class'=>'alert-danger'
            ]);
            return redirect()->route('clientes.detalhe',$telefone->cliente->id);
        }
        return view('telefones.editar', compact('telefone'));
    }


    //atualiza os dados do cliente
    public function atualizar(TelefoneRequest $request, $id){
    	$telefone=\App\Telefone::find($id);
        \App\Telefone::find($id)->update($request->all());
        \Session::flash('flash_message',[
                'msg'=>'Telefone atualizado',
                'class'=>'alert-success'
        ]);
        return redirect()->route('clientes.detalhe',$telefone->cliente->id);
    }


    // botao deletar cliente
    public function deletar($id){
        $telefone = \App\Telefone::find($id);
        $telefone->delete();
        \Session::flash('flash_message',[
                'msg'=>'telefone deletado com sucesso',
                'class'=>'alert-success'
        ]);
        return redirect()->route('clientes.detalhe',$telefone->cliente->id);
    }
}
