@extends('adminlte::page')

@section('title', 'Busca de Parceiros')

@section('content')

<h3>Busca de Parceiros</h3>

<form method="POST" action="{{ route('parceiros.relParceiros') }}"
  enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <label for="cidade">Nome da Cidade</label>
        <input type="text" id="cidade" name="cidade" required 
               class="form-control">
      </div>
    </div>
</div>

<input type="submit" value="Buscar" class="btn btn-primary">
</form>

@endsection