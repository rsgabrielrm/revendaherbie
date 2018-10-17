@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Marcas
    <a href="{{ route('marcas.create') }}" 
       class="btn btn-primary pull-right" role="button">Novo</a>
    </h1>
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif

<table class="table table-striped">
  <tr>
    <th> Id </th>
    <th> Nome </th>
  </tr>  
@forelse($marcas as $c)
  <tr>
    <td> {{$c->id}} </td>
    <td> {{$c->nome}} </td>
  </tr>
@empty
  <tr><td colspan=8> Não há Marcas cadastradas</td></tr>
@endforelse
</table>

{{ $marcas->links() }}

@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection