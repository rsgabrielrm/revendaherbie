<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;
use App\Marca;
use App\Propostas;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SiteController extends Controller {
    public function index() {

        // $dados = Carro::all();
        $dados = Carro::paginate(5);
        $sql = "SELECT * FROM carros  WHERE destaque = '*' ORDER BY RAND() LIMIT 4";
		$destaques = DB::select($sql);
        return view('home', ['carros' => $dados, 'destaques' => $destaques]);

    }

    public function destaques() {
    	$destaques = Carro::where('destaque', '*')->paginate(5);
        return view('destaques', ['destaques' => $destaques]);
    }

    public function buscacarros(Request $request) {
    	$modelo = $request->input('modelo');
    	// Destaque
    	$sqlDestaque = "SELECT * FROM carros  WHERE destaque = '*' ORDER BY RAND() LIMIT 4";
		$destaques = DB::select($sqlDestaque);
		// Busca carros 
		// $sqlCarros = "SELECT * FROM carros WHERE modelo LIKE '%".$str."%'"; 
		// $sqlCarros = "SELECT * FROM carros WHERE modelo LIKE '%sa%'"; 
		// $dados = DB::select($sqlCarros)->paginate(5);
    	// $dados = Carro::where('modelo', 'like', '%'.$modelo.'%')->paginate(5);
    	$dados = Carro::where('modelo', 'like', '%'.$modelo.'%')->paginate(5);
        // return view('home', ['carros' => $dados, 'destaques' => $destaques]);
        return view('home', ['carros' => $dados, 'destaques' => $destaques]);
    }

    public function detalhes($id) {
        // posiciona no registro a ser alterado e obtém seus dados
        $dados = Carro::find($id);
        return view('detalhes_carros', ['detalhes' => $dados]);
    }

    public function propostas(Request $request){
    	
        $dados = $request->all();
        
        $inc = Propostas::create($dados);

        if ($inc) {
            return redirect()->route('site.home')
                   ->with('status','Proposta enviada com sucesso!');     
        }

    }

}