@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <ol class="breadcrumb panel-heading">
                	<li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                	<li class="active">Editar</li>
                </ol> 	
                <div class="panel-body">

                <form action="{{ route('clientes.atualizar',$cliente->id) }}" method="post">
                	{{ csrf_field() }}
                	<input type="hidden" name="_method" value="put">
                	<div class="form-group {{ $errors->has('nome')?'has-error':'false'}}" >
                		<label for="nome">Nome</label>
                		<input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}">
                        @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{$errors->first('nome')}}</strong>
                            </span>
                        @endif
                	</div>
                	<div class="form-group {{ $errors->has('email')?'has-error':'false'}}" >
                		<label for="email">Email</label>
                		<input type="text" name="email" class="form-control" value="{{$cliente->email }}">
                        @if($errors->has('email'))
                            <span class="help-block">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                	</div>
                	<div class="form-group {{ $errors->has('endereço')?'has-error':'false'}}" >
                		<label for="endereço">Endereço</label>
                		<input type="text" name="endereço" class="form-control" value="{{ $cliente->endereço }}">
                        @if($errors->has('endereço'))
                            <span class="help-block">
                                <strong>{{$errors->first('endereço')}}</strong>
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