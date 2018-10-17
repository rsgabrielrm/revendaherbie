<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;
use App\Parceiros;

class wsController extends Controller
{
    public function wsCarro($id=null){
    	// indica o tipo de retorno do método
    	header("Content-type: application/json; charset=utf-8");
    	// verifica se id foi (ou não passado)
    	if( $id == null) {
    		$retorno = array("status" => "url incorreta",
    						 "modelo" => null,
    						 "ano" => null,
    						 "preco" => null);
    	} else {
    		// busca registro
    		$reg = Carro::find($id);
    		// se encontrato
    		if(isset($reg)) {
    			$retorno =  array("status" => "Encontrado",
    						 "modelo" => $reg->modelo,
    						 "ano" => $reg->ano,
    						 "preco" => $reg->preco);
    		} else {
    			$retorno = array("status" => "inexistente",
    						 "modelo" => null,
    						 "ano" => null,
    						 "preco" => null);
    		}
    	}

    	// converte array para json
    	echo json_encode($retorno, JSON_PRETTY_PRINT);
    }
    public function wsxmlParceiros($cidade = null){
        //indica o tipo de retorno
        header("Content-type: application/xml");
        
        //adiciona parceiros ao XML
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><parceiros></parceiros>');

        //verifica se $id não foi passado
        if ($cidade == null){
            //seria um filho do parceiros que estamos buscando na linha de cima
            $item = $xml->addChild('parceiro');
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
                $item = $xml->addChild('parceiro');
                $item -> addChild("status","Encontrado");
                $item -> addChild("nome","$p->nome");
                $item -> addChild("email","$p->email");
                $item -> addChild("telefone","$p->telefone");
                $item -> addChild("cidade","$p->cidade");
                }
            }else {
                $item = $xml->addChild('parceiro');
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

    public function wsjsonParceiros($cidade=null){
        //indica o tipo de retorno do método
        header("Content-type: application/json; carset=utf-8");

        //verifica se id foi (ou não) passado
        if($cidade==null){
            $retorno = array("status" => "url incorreta",
                        "nome" => null,
                        "email" => null,
                        "telefone" => null,
                        "cidade" => null);
        }else{
            //busca o registro
            $reg = Parceiros::where("cidade","=",$cidade)->get();
            //se encontrado
            if(isset($reg)){
                $arraux = [];
                if(count($reg)>0){
                    foreach ($reg as $k) {
                        $aux = array("nome" => $k->nome,
                        "email" => $k->email,
                        "telefone" => $k->telefone,
                        "cidade" => $k->cidade);
                        array_push($arraux, $aux);
                    }
                    $retorno = array("status" => "encontrado", "dados" => $arraux);
                } else {
                    $retorno = array("status" => "inexistente",
                        "nome" => null,
                        "email" => null,
                        "telefone" => null,
                        "cidade" => null);
            
                }
                
               
            } else{
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
}
