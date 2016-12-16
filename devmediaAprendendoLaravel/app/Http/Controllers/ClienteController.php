<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
class ClienteController extends Controller
{
    //


    //função para segurança do projeto, acesso apenas com login.
    public function __construct()
    {
        $this->middleware('auth');
    }


    //lista clientes e tem paginação
    public function index(){
    	$clientes = \App\Cliente::paginate(10);
    	//dd($clientes);

    	return view('clientes.index', compact('clientes'));
    }


    //tela de adicionar cliente novo
    public function adicionar(){
        return view('clientes.adicionar');
    }

    //pagina de detalhes do cliente
    public function detalhe($id){
        $cliente=\App\Cliente::find($id);
        return view('clientes.detalhe', compact('cliente'));
    }

    //salva novo contato
    public function salvar(ClienteRequest $request){
        \App\Cliente::create($request->all());
        \Session::flash('flash_message',[
            'msg'=>'Cliente Adicionado com Sucesso',
            'class'=>'alert-success'
        ]);
        return redirect()->route('clientes.adicionar');
        
    }


    //tela de edição
    public function editar($id){
        $cliente=\App\Cliente::find($id);
            if(!$cliente){
             \Session::flash('flash_message',[
                'msg'=>'Cliente não encontrado',
                'class'=>'alert-danger'
            ]);
            return redirect()->route('clientes.index');
        }
        return view('clientes.editar', compact('cliente'));
    }


    //atualiza os dados do cliente
    public function atualizar(ClienteRequest $request, $id){
        \App\Cliente::find($id)->update($request->all());
        \Session::flash('flash_message',[
                'msg'=>'Cliente atualizado',
                'class'=>'alert-success'
        ]);
        return redirect()->route('clientes.index');
    }


    // botao deletar cliente
    public function deletar($id){
        $cliente = \App\Cliente::find($id);
        if(!$cliente->deletarTelefones()){
            \Session::flash('flash_message',[
                'msg'=>'Erro ao Deletar Cliente',
                'class'=>'alert-danger'
            ]);
            return redirect()->route('clientes.index');
        }
        $cliente->delete();
        \Session::flash('flash_message',[
                'msg'=>'Cliente deletado com sucesso',
                'class'=>'alert-success'
        ]);
        return redirect()->route('clientes.index');
    }

    


}
