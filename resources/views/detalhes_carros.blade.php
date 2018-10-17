@extends('principal')
@section('conteudo')
@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif


<!-- Detalhes -->
<div class="container">
	<div class="row">
		<div class="page-header">
			<h1>Detalhes</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6 text-center">
			@if (Storage::exists($detalhes->foto))
				<img src="{{url('storage/'.$detalhes->foto)}}"  alt="Foto do Carro">
			@else
				<img src="{{url('storage/fotos/semfoto.jpeg')}}" alt="Sem Foto">
			@endif
		</div>
		<div class="col-xs-12 col-md-6">
			<h3>Modelo: {{$detalhes->modelo}}</h3>
			<p>Marca: {{$detalhes->marca->nome}}</p>
			<p>Cor: {{$detalhes->cor}}</p>
			<p>Ano: {{$detalhes->ano}}</p>
			<p>Combustivel: {{$detalhes->combustivel}}</p>
			<p>Valor: R$ {{number_format($detalhes->preco, 2, ',', '.')}}</p>
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				Fazer proposta</button>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Envie sua proposta</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						@if (Storage::exists($detalhes->foto))
							<img src="{{url('storage/'.$detalhes->foto)}}"  alt="Foto do Carro">
						@else
							<img src="{{url('storage/fotos/semfoto.jpeg')}}" style="height: 200px;" alt="Sem Foto">
						@endif
						<h3>Modelo: {{$detalhes->modelo}}</h3>
						<p>Marca: {{$detalhes->marca->nome}}</p>
						<p>Cor: {{$detalhes->cor}}</p>
						<p>Ano: {{$detalhes->ano}}</p>
						<p>Combustivel: {{$detalhes->combustivel}}</p>
						<p>Valor: R$ {{number_format($detalhes->preco, 2, ',', '.')}}</p>
					</div>
					<div class="col-md-6">
						<form method="POST" action="{{ route('site.propostas') }}">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="email">Modelo: </label>
								<p class="form-control">{{$detalhes->modelo}}</p>
								<input type="hidden" name="carro_id" value="{{$detalhes->id}}">
							</div>
							<div class="form-group">
								<label for="nome">Nome:</label>
								<input name="nome" type="text" class="form-control" id="nome" placeholder="Digite seu nome" required>
							</div>
							<div class="form-group">
								<label for="telefone">Telefone:</label>
								<input name="telefone" type="text" class="form-control" id="telefone" placeholder="Digite seu telenfone" required>
							</div>
							<div class="form-group">
								<label for="email">E-mail:</label>
								<input name="email" type="email" class="form-control" id="email" placeholder="E-mail" required>
							</div>
							<div class="form-group">
								<label for="proposta">Proposta:</label>
								<input name="proposta" type="text" class="form-control" id="proposta" placeholder="Digite seu proposta" required>
							</div>
								<input type="submit" value="Enviar" class="btn btn-success">					
							</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				
			</div>
		</div>
	</div>
</div>

 	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script src="/js/jquery.mask.min.js"></script>
	<script>
  		$(document).ready(function() {
  			$('#telefone').mask('(00) 00000-0000', {placeholder: "(00) 0000-0000"});
  			$('#proposta').mask('#.###.##0,00', {reverse: true});
  		});
	</script>
@endsection