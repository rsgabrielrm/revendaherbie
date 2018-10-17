<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;


class UsuariosController extends Controller
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
        //if(!Auth::check()){
        //    return redirect("/home");
        //}
        
        //$dados = Carro::all();
        $dados = User::all();

        return view('admin.usuarios_list', ['usuarios' => $dados]);
    }

}