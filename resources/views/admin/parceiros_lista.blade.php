@extends('adminlte::page')

@section('title', 'Lista de Parceiros')

@section('content_header')
    <h1>Cadastro de Parceiros
    <a href="{{ route('parceiros.create') }}" 
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
    <th> Nome </th>
    <th> E-mail </th>
    <th> Telefone </th>
    <th> Cidade </th>
    <th> Ações </th>
  </tr>  
@forelse($parceiros as $p)
  <tr>
    <td> {{$p->nome}} </td>
    <td> {{$p->email}} </td>
    <td> {{$p->telefone}} </td>
    <td> {{$p->cidade}} </td>
    <td> 
        <a href="{{route('parceiros.edit', $p->id)}}" 
            class="btn btn-warning btn-sm" title="Alterar"
            role="button"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
        <form style="display: inline-block"
              method="post"
              action="{{route('parceiros.destroy', $p->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" title="Excluir"
                      class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>&nbsp;&nbsp;
    </td>
  </tr>
@empty
  <tr><td colspan=8> Não há parceiros cadastrados. </td></tr>
@endforelse
</table>

@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection