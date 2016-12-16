@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li><a href="{{ route('clientes.detalhe',$cliente->id) }}">Detalhes</a></li>
                    <li class="active">Adicionar Telefone</li>
                </ol>   
                <div class="panel-body">

                <form action="{{ route('telefones.salvar',$cliente->id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('titulo')?'has-error':'false'}}">
                        <label for="titulo">Titulo do telefone</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo">
                        @if($errors->has('titulo'))
                            <span class="help-block">
                                <strong>{{$errors->first('titulo')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('telefone')?'has-error':'false'}}">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                        @if($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{$errors->first('telefone')}}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <button class="btn btn-success">Salvar</button>

                </form>
                       
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection