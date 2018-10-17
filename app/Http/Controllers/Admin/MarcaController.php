<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Carro;
use App\Marca;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;




class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $dados = Marca::paginate(5);

        return view('admin.marcas_list', ['marcas' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // informações auxiliares que serão utilizadas no form de cadastro      
        return view('admin.marcas_form', ['acao' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:2|max:40',
        ]);

        // obtém todos os campos do formulário
        $dados = $request->all();
        // print_r($dados['nome']);
        $nome = ucwords(strtolower($dados['nome']));
        // print_r($key);
        $busca = Marca::where('nome', $nome)->first();
        // $max = sizeof($huge_array)
        print_r(sizeof($busca));
        if(sizeof($busca) > 0){
            return redirect()->back()
                   ->with('status', 'Marca '. $request->nome . ' já existe no sistema!');
        } else {
            $inc = Marca::create(['nome' => $nome]);
            if ($inc) {
                return redirect()->route('marcas.index')
                       ->with('status', 'Marca '. $request->nome . ' inserido com sucesso!');     
            } else {
                return redirect()->back()
                   ->with('status', 'Erro ao cadastrar  '. $request->nome);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
    
}

