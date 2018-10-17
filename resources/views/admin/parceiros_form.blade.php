@extends('adminlte::page')

@section('title', 'Cadastro de Parceiros')

@section('content_header')

@if ($acao==1)
<h2>Inclusão de Parceiros
@else ($acao ==2)
<h2>Alteração de Parceiros
@endif          

  <a href="{{ route('parceiros.index') }}" class="btn btn-primary pull-right" role="button">Voltar</a>
</h2>

@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($acao==1)
<form method="POST" action="{{ route('parceiros.store') }}"
  enctype="multipart/form-data">
  @else ($acao==2)
  <form method="POST" action="{{route('parceiros.update', $reg->id)}}"
  enctype="multipart/form-data">
  {!! method_field('put') !!}
  @endif          
  {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <label for="nome">Nome do Parceiro</label>
            <input type="text" id="nome" name="nome" required 
               value="{{$reg->nome or old('nome')}}"
               class="form-control">
            </div>
        </div>             

      <div class="col-sm-6">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" required 
                 value="{{$reg->email or old('email')}}"
                 class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" required 
                   value="{{$reg->telefone or old('telefone')}}"
                   class="form-control">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" id="cidade" name="cidade" required 
                 value="{{$reg->cidade or old('cidade')}}"
                 class="form-control">
        </div>
      </div>
    </div>

  <input type="submit" value="Enviar" class="btn btn-success">
  <input type="reset" value="Limpar" class="btn btn-warning">
</form>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<script>
  $(document).ready(function() {
    $('#telefone').mask('(00) 0 0000-0000');
  });
</script>
@endsection