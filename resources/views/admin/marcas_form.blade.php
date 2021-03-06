@extends('adminlte::page')

@section('title', 'Cadastro de Carros')

@section('content_header')

@if ($acao==1)
<h2>Inclusão de Marcas
@else ($acao ==2)
<h2>Alteração de Marcas
@endif          

  <a href="{{ route('marcas.index') }}" class="btn btn-primary pull-right" role="button">Voltar</a>
</h2>

@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-error">
      {{ session('status') }}
    </div>  
@endif

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
<form method="POST" action="{{ route('marcas.store') }}"
  enctype="multipart/form-data">
@else ($acao==2)
<form method="POST" action="{{route('marcas.update', $reg->id)}}"
  enctype="multipart/form-data">
{!! method_field('put') !!}
@endif          
{{ csrf_field() }}

<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required 
               value="{{$reg->nome or old('nome')}}"
               class="form-control">
      </div>
      <input type="submit" value="Enviar" class="btn btn-success">
      <input type="reset" value="Limpar" class="btn btn-warning">
    </div>
  </form>
</div>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<script>
  $(document).ready(function() {
    $('#preco').mask('#.###.##0,00', {reverse: true});
  });
</script>
@endsection