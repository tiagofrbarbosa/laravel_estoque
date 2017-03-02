@extends('layout.principal')

	@section('conteudo')

@if(empty($produtos))
		<div class="alert alert-danger">Você não tem nenhum produto cadastrado. </div>

@else
<h1>Listagem de Produtos</h1>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<td>Nome</td>
		<td>Valor</td>
		<td>Descrição</td>
		<td>Quantidade</td>
		<td>Detalhes</td>
		<td>Remover</td>
	</tr>
	@foreach ($produtos as $p)
	<tr class="{{$p->quantidade<=1 ? 'danger' : ''}}">
		<td>{{ $p->nome }}</td>
		<td>{{ $p->valor }}</td>
		<td>{{ $p->descricao }}</td>
		<td>{{ $p->quantidade }}</td>
		<td><a href="{{action('ProdutoController@mostra', $p->id)}}">
		<span class="glyphicon glyphicon-search"></span>
		</a></td>
		<td><a href="{{action('ProdutoController@remove', $p->id)}}">
		<span class="glyphicon glyphicon-trash"></span>
		</a></td>
	</tr>
@endforeach
</table>

		@endif


		<h4>
			<span class="label label-danger pull-right">
					Um ou menos itens no estoque
			</span>
		</h4>

		@if(old('nome'))
		<div class="alert alert-success">O produto <strong>{{old('nome')}}</strong> foi adicionado com sucesso!</div>
		@endif

	@stop
