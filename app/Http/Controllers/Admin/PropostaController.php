<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Carro;
use App\Marca;
use App\Propostas;
use App\Mail\Enviaemail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;




class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function propostas()
    {
        $dados = Propostas::paginate(3);

        return view('admin.propostas_list', ['propostas' => $dados]);
    }
    public function detalhes($id)
    {
        // posiciona no registro a ser alterado e obtém seus dados
        $reg = Propostas::find($id);
        
        return view('admin.proposta_form', ['detalhes' => $reg]);
    }
    // public function destroy($id)
    // {
    //     echo "destroy";
    // }
    public function enviaresposta(Request $request)
    {
        // echo "oi";
        // $req->validate([
        //         'mensagem'=>'required'
        //     ]);
        $data = [
            'email'=>$request->destinatario,
            'nome'=>$request->nome,
            'modelo'=>$request->modelo,
            'subject'=>$request->assunto,
            'dataproposta'=>$request->dataproposta,
            'proposta'=>$request->proposta,
            'bodyMessage'=>$request->mensagem
        ];
        Mail::send('admin.mail', $data, function($message) use ($data){
            $message->from('dmsgabrielrs@gmail.com', 'Revenda Herbie');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
        // Mail::to('gabrielkcm@hotmail.com')->send(new Enviaemail($request));
        // return redirect()->route('propostas');
        // return redirect()->route('proposta')
        return redirect()->back()
                            ->with('status','E-mail enviado com sucesso!');
    }
    // grafico
    public function graficoproposta() {
        $sql = "SELECT  MONTH(created_at) as mes, COUNT(*) as total FROM propostas GROUP BY MONTH(created_at)";

        $consulta = DB::select($sql);
        $teste = [];
        foreach ($consulta as $m) {
            switch ($m->mes) {
              case 1:
                $mes = "Janeiro";
                break;
              case 2:
                $mes = "Fevereiro";
                break;
              case 3:
                $mes = "Março";
                break;
              case 4:
                $mes = "Abril";
                break;
              case 5:
                $mes = "Maio";
                break;
              case 6:
                $mes = "Junho";
                break;
              case 7:
                $mes = "Julho";
                break;
              case 8:
                $mes = "Agosto";
                break;
              case 9:
                $mes = "Setembro";
                break;
              case 10:
                $mes = "Outubro";
                break;
              case 11:
                $mes = "Novembro";
                break;
              case 12:
                $mes = "Dezembro";
                break;
              default:
                $mes = "erro";
                break;
            }
            $total = $m->total;
            $arraux = (object) array("mes"=>$mes, "total"=>$total );
            array_push($teste, $arraux);
        }
        $dados = array_merge($teste);
        // print_r($consulta   );
        return view('admin.propostas_graf', ['dados'=>$dados]);
    }
}

