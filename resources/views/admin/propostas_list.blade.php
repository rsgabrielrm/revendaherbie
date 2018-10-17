@extends('adminlte::page')

@section('title', 'Propostas')

@section('content_header')
    <h1>Propostas
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif

<table class="table table-striped">
  <tr>
    <th> Cliente </th>
    <th> Carro </th>
    <th> E-mail </th>
    <th> Telefone </th>
    <th> Proposta R$ </th>
    <th> Data Proposta. </th>
    <th> Responder </th>
  </tr>  
@forelse($propostas as $c)
  <tr>
    <td> {{$c->nome}} </td>
    <td> {{$c->carro->modelo}} </td>
    <td> {{$c->email}} </td>
    <td> {{$c->telefone}} </td>
    <td> {{number_format($c->proposta, 2, ',', '.')}} </td>
    <td> {{date_format($c->created_at, 'd/m/Y')}} </td>
    <td> 
       
        <a href="propostas/{{$c->id}}" 
            class="btn btn-primary btn-sm" title="Detalhes"
            role="button"><i class="far fa-share-square"></i></a>
        
    </td>
  </tr>

@empty
  <tr><td colspan=8> Não há propostas recebidas </td></tr>
@endforelse
</table>

{{ $propostas->links() }}

@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection