<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Carro;
use App\Marca;
use App\Parceiros;

class ParceirosController extends Controller
{
   public function index(){

        $dados = Parceiros::all();
        return view('admin.parceiros_lista', ['parceiros' => $dados]);
            

   }
   public function show($id) {
   }

   public function create() {

    return view('admin.parceiros_form', ['acao' => 1]);
       
   }

   public function store(Request $request) {

    $this->validate($request, [
        'nome' => 'required|min:2|max:200',
        'email' => 'required',
        'telefone' => 'min:9|max:40'
    ]);
        
    Parceiros::create($request->all());

    return redirect()->route('parceiros.index')
        ->with('status','Parceiro incluído com sucesso!');

   }

   public function edit($id) {
    // posiciona no registro a ser alterado e obtém seus dados
    $reg = Parceiros::find($id);
    
    return view('admin.parceiros_form', ['reg' => $reg, 'acao' => 2]);


   }

   public function update(Request $request, $id) {

        $dados = $request->all();

        // posiciona no registo a ser alterado
        $reg = Parceiros::find($id);

         // realiza a alteração
         $alt = $reg->update($dados);
        
        if ($alt) {
            return redirect()->route('parceiros.index')
                            ->with('status', $request->nome . ' Alterado!');
        }
       
   }

   public function destroy($id){

        $prop = Parceiros::find($id);

        if ($prop->delete()) {
            return redirect()->route('parceiros.index')
                    ->with('status', 'Parceiro ' . $prop->nome . ' excluído!');
        }   
   }
   
    public function wsxmlparceiros($cidade = null){
        //indica o tipo de retorno
        header("Content-type: application/xml");
        
        //adiciona parceiros ao XML
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><parceiros></parceiros>');

        //verifica se $id não foi passado
        if ($cidade == null){
            //seria um filho do parceiros que estamos buscando na linha de cima
            $item = $xml->addChild('proprietario');
            //atributos deste registro
            $item -> addChild("status","url incorreta");
            $item -> addChild("nome",null);
            $item -> addChild("email",null);
            $item -> addChild("telefone",null);
            $item -> addChild("cidade",null);
        }else {
            //busca os veículo cujo preco seja menos que $preco
            $parceiros = Parceiros::where("cidade","=",$cidade)->get();
            
            //se existe
            if(count($parceiros) > 0){
                foreach($parceiros as $p){
                $item = $xml->addChild('proprietario');
                $item -> addChild("status","Encontrado");
                $item -> addChild("nome","$p->nome");
                $item -> addChild("email","$p->email");
                $item -> addChild("telefone","$p->telefone");
                $item -> addChild("cidade","$p->cidade");
                }
            }else {
                $item = $xml->addChild('proprietario');
                $item -> addChild("status","Inexistente");
                $item -> addChild("nome",null);
                $item -> addChild("email",null);
                $item -> addChild("telefone",null);
                $item -> addChild("cidade",null);
            }
        }
        //retorna os dados no format XML
        echo $xml->asXML();
    }

    public function wsjsonparceiros($id=null){
        //indica o tipo de retorno do método
        header("Content-type: application/json; carset=utf-8");

        //verifica se id foi (ou não) passado
        if($id==null){
            $retorno = array("status" => "url incorreta",
                        "nome" => null,
                        "email" => null,
                        "telefone" => null,
                        "cidade" => null);
        }else{
            //busca o registro
            $reg = Parceiros::find($id);

            //se encontrado
            if(isset($reg)){
                $retorno = array("status" => "encontrado",
                        "nome" => $reg->nome,
                        "email" => $reg->email,
                        "telefone" => $reg->telefone,
                        "cidade" => $reg->cidade);
            }else{
                $retorno = array("status" => "inexistente",
                        "nome" => null,
                        "email" => null,
                        "telefone" => null,
                        "cidade" => null);
            }
        }
        // converte array para formato json
        echo json_encode($retorno, JSON_PRETTY_PRINT);
    }

    public function relparceiros(request $request){
        $cidade = $request->cidade;
        $filtro = array();
        if(!empty($cidade)){
                array_push($filtro, array('cidade','like','%'.$cidade.'%'));
        }

        $parceiros = Parceiros::where($filtro)->orderBy('cidade')->paginate(5);

        //stream exibe o relatório, está lá na rota do PDF
        return \PDF::loadView('admin.relatorio_parceiros',['parceiros'=>$parceiros])->stream();
    }

    public function filtro(){

        return view('admin.filtro_pdf');
    }
}