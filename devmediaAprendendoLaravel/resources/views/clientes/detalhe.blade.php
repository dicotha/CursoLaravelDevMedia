@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li class="active">Detalhe</li>
                </ol> 

                <div class="panel-body">
                   <p><strong>Cliente: {{$cliente->nome}}</strong></p>
                   <p><strong>Cliente: {{$cliente->email}}</strong></p>
                   <p><strong>Cliente: {{$cliente->endereço}}</strong></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Numero</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $cliente->telefones as $tel )
                            <tr>
                                <th scope="row">{{ $tel->id }}</th>
                                <td>{{ $tel->titulo }}</td>
                                <td>{{ $tel->telefone }}</td>
                                <td>
                                    <a href="{{route('telefones.editar',$tel->id)}}" class="btn btn-default">Editar</a>
                                    <a href="javascript:(confirm('deletar esse registro') ? window.location.href='{{route('telefones.deletar',$tel->id)}}' :false)" class="btn btn-danger">Deletar</a>
                                </td>
                           </tr>
                           @endforeach
                        </tbody>

                    </table>
                    <p>
                        <a href="{{route('telefones.adicionar',$cliente->id)}}" class="btn btn-info">Adicionar Telefone</a>
                    </p>
                   
                       
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection