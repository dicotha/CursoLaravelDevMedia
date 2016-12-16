@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                    <li class="active">Clientes</li>
                </ol>
                <div class="panel-body">
                    <p>
                        <a href="{{ route('clientes.adicionar') }}" class="btn btn-info">Adicionar</a>
                    </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Endereço</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <th scope="row">{{ $cliente->id }}</th>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->endereço }}</td>
                                <td>
                                    <a href="{{ route('clientes.editar',$cliente->id) }}" class="btn btn-default">Editar</a>
                                    <a href="{{ route('clientes.detalhe',$cliente->id) }}" class="btn btn-default">Detelhe</a>
                                    <a href="javascript:(confirm('deletar esse registro') ? window.location.href='{{route('clientes.deletar',$cliente->id)}}' :false)" class="btn btn-danger">Deletar</a>
                                </td>
                           </tr>
                        @endforeach
                        </tbody>

                    </table>

                       
                    
                    <div align="center">
                        {!! $clientes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection