@extends('adminlte::page')

@section('title', 'Proposta - Detalhes')

@section('content_header')

  <a href="{{ route('propostas') }}" class="btn btn-primary pull-right" role="button">Voltar</a>
</h2>

@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success">
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
<div class="row">
  <div class="col-md-6 center-block">
    @if (Storage::exists($detalhes->carro->foto))
      <img src="{{url('storage/'.$detalhes->carro->foto)}}"  alt="Foto do Carro" style="display: block; margin-left:  auto; margin-right:  auto; margin-top: 8%;">
    @else
      <img src="{{url('storage/fotos/semfoto.jpeg')}}" style="height: 200px; display: block; margin-left:  auto; margin-right:  auto; margin-top: 8%;" alt="Sem Foto">
    @endif
  </div>
  <div class="col-md-6">
    <h3>Modelo: {{$detalhes->carro->modelo}}</h3>
    <p>Marca: {{$detalhes->carro->marca->nome}}</p>
    <p>Cor: {{$detalhes->carro->cor}}</p>
    <p>Ano: {{$detalhes->carro->ano}}</p>
    <p>Combustivel: {{$detalhes->carro->combustivel}}</p>
    <p>Valor: R$ {{number_format($detalhes->carro->preco, 2, ',', '.')}}</p>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h3>Detalhes</h3>
    <p>Proposta nº: {{$detalhes->id}}</p>
    <p>Cliente: {{$detalhes->nome}}</p>
    <p>Telefone: {{$detalhes->telefone}}</p>
    <p>E-mail: {{$detalhes->email}}</p>
    <p>Data: {{date_format($detalhes->created_at, 'd/m/Y')}}</p>
    <p>Valor: R$ {{number_format($detalhes->proposta, 2, ',', '.')}}</p>
  </div>
  <div class="col-md-6">
    <form method="POST" action="{{ route('enviaresposta') }}">
      {{ csrf_field() }}
      {{method_field('post')}}
      <div class="form-group">
        <h3>Responder porposta</h3>
      </div>
      <div class="form-group">
        Nome: <p class="form-control">{{$detalhes->nome}}</p>
        <input type="hidden" class="form-control" name="nome" value="{{$detalhes->nome}}">
        <input type="hidden" class="form-control" name="proposta" value="{{$detalhes->proposta}}">
        <input type="hidden" class="form-control" name="dataproposta" value="{{date_format($detalhes->created_at, 'd/m/Y')}}">
        <input type="hidden" class="form-control" name="modelo" value="{{$detalhes->carro->modelo}}">
      </div>
      <div class="form-group">
        Destinatário: <p class="form-control">{{$detalhes->email}}</p>
        <input type="hidden" class="form-control" name="destinatario" value="{{$detalhes->email}}">
      </div>
       <div class="form-group">
        Assunto: <p class="form-control">Resposta sobre proposta do veículo {{$detalhes->carro->modelo}}</p>
        <input type="hidden" name="assunto" class="form-control" value="Resposta sobre proposta do veículo {{$detalhes->carro->modelo}}">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="mensagem" rows="3"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Enviar" class="btn btn-azul btn btn-primary btn-md btn-block">
      </div>
    </form>
  </div>
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