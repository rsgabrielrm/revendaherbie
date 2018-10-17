@extends('principal')
@section('conteudo')
@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif

<!-- Destaques -->

<div class="container">
	<div class="row">
		<div class="page-header">
			<h1>Veículos em destaque</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		@forelse($destaques as $c)
		  <div class="col-xs-6 col-md-3 ">
		    <div class="thumbnail text-center ">
		      	@if (Storage::exists($c->foto))
					<img src="{{url('storage/'.$c->foto)}}"  alt="Foto do Carro">
				@else
					<img src="{{url('storage/fotos/semfoto.jpeg')}}" style="height: 189px;" alt="Sem Foto">
				@endif
		      <div class="caption">
		        <h3>{{$c->modelo}}</h3>
		        <p>R$ {{number_format($c->preco, 2, ',', '.')}}</p>
		        <p><a href="/detalhes/{{$c->id}}" class="btn btn-default" role="button">DETALHES</a></p>
		      </div>
		    </div>
		  </div>
		@empty
			 <h3>Não existem carros destacados...</h3>
		@endforelse
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			{{ $destaques->links() }}
		</div>
	</div>
</div>
<!-- todos os carros -->


@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection