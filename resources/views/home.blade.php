@extends('principal')
@section('conteudo')
@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif
<div class="container">
	<div class="row">
		<div class="page-header">
			<h1>Veículos em destaque</h1>
		</div>
	</div>
</div>
<!-- Destaques -->
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
		@endforelse
	</div>
</div>
<!-- todos os carros -->

<br><br><br>
<div class="container">
	<div class="row">
		<div class="page-header">
			<h1>Veículos</h1>
		</div>
	</div>
	<div class="row">
		<nav class="navbar navbar-default" style="margin-top: 30px; margin-bottom: 30px;">
		  <div class="container-fluid">
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		     <ul class="nav navbar-nav navbar-right">
		        <form method="POST" class="navbar-form navbar-left">
		        	{{ csrf_field() }}
		         	<div class="form-group">
		            	<input name="modelo" type="text" class="form-control" placeholder="Buscar por modelo">
		        	</div>
		          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> </button>
		        </form>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
	<div class="row">
		<table class="table table-striped text-center">
		  <tr >
		    <th class="text-center"	> Veiculo </th>
		    <th class="text-center"> Modelo </th>
		    <th class="text-center"> Ano </th>
		    <th class="text-center"> Preço R$ </th>
		    <th class="text-center"> Detalhes </th>
		  </tr>  
		@forelse($carros as $c)
		  <tr>
		    <td>
		      @if (Storage::exists($c->foto))
		      <img src="{{url('storage/'.$c->foto)}}"
		            style="width: 220px; height: 90px"
		            alt="Foto do Carro">
		      @else
		        <img src="{{url('storage/fotos/semfoto.jpeg')}}"
		              style="width: 220px; height: 90px"
		              alt="Sem Foto">
		      @endif
		    </td>
		    <td> {{$c->modelo}} </td>
		    <td> {{$c->ano}} </td>
		    <td> {{number_format($c->preco, 2, ',', '.')}} </td>
		    <td> 
		      <a href="/detalhes/{{$c->id}}" class="btn btn-default"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a>
		    </td>
		  </tr>
		 
		@empty
		  <tr><td colspan=8> Não há carros cadastrados ou filtro da pesquisa não encontrou registros </td></tr>
		@endforelse
		</table>
			{{ $carros->links() }}
		
	</div>

</div>
@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection