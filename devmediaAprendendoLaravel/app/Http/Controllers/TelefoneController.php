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
		$notification = array(
            'message' => 'Telefone Salvo Com Sucesso', 
            'alert-type' => 'success'
        );
        session()->set('notifica',$notification);
        return redirect()->route('clientes.detalhe',$id);
    }

    //tela de edição
    public function editar($id){
        $telefone=\App\Telefone::find($id);
            if(!$telefone){
             $notification = array(
                'message' => 'Telefone Não Existe', 
                'alert-type' => 'warning'
            );
            session()->set('notifica',$notification);
            return redirect()->route('clientes.detalhe',$telefone->cliente->id);
        }
        return view('telefones.editar', compact('telefone'));
    }


    //atualiza os dados do cliente
    public function atualizar(TelefoneRequest $request, $id){
    	$telefone=\App\Telefone::find($id);
        \App\Telefone::find($id)->update($request->all());

        $notification = array(
            'message' => 'Telefone atualizado', 
            'alert-type' => 'success'
        );
        session()->set('notifica',$notification);

        /*\Session::flash('flash_message',[
                'msg'=>'Telefone atualizado',
                'class'=>'alert-success'
        ]);*/
        return redirect()->route('clientes.detalhe',$telefone->cliente->id);
    }


    // botao deletar telefone
    public function deletar($id){
        $telefone = \App\Telefone::find($id);
        $telefone->delete();
        /*\Session::flash('flash_message',[
                'msg'=>'telefone deletado com sucesso',
                'class'=>'alert-success'
        ]);*/
        $notification = array(
            'message' => 'Telefone deletado com sucesso', 
            'alert-type' => 'error',

        );
        \Session::set('notifica',$notification);
        return redirect()->route('clientes.detalhe',$telefone->cliente->id);
    }

    /*notificacao ToaStr
    public function notifica(){
        $notification = array(
            'message' => 'Thanks! We shall get back to you soon.', 
            'alert-type' => 'success'
        );
        session()->set('notification',$notification);
        return view('notification');
    
    }*/
}
