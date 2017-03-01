<?php 

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;

class ProdutoController extends Controller{


	public function lista(){
		$produtos = Produto::all();
		return view('produto.listagem')->with('produtos',$produtos);
	}




	public function mostra($id){
		$resposta = DB::select('select * from produtos where id = ?',[$id]);
		if(empty($resposta)){
				return "Esse produto não existe";
			}
		return view('produto.detalhes')->with('p', $resposta[0]);
	}



	public function novo(){
		return view('produto.formulario');
	}



	public function adiciona(){
			$nome = Request::input('nome');
			$descricao = Request::input('descricao');
			$valor = Request::input('valor');
			$quantidade = Request::input('quantidade');

			DB::insert('INSERT INTO produtos(nome,descricao,valor,quantidade) VALUES(?,?,?,?)',array($nome,$descricao,$valor,$quantidade));
	
			return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
	}


	public function listaJson(){
		$produtos = Produto::all();
		return response()->json($produtos);
	}
}