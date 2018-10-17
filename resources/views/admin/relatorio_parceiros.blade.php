<h1>Revenda Herbie</h1>
<h2>Relatório de Parceiros Cadastrados</h2>

<table border=1>
    <tr><td>Nome</td>
    <td>E-mail</td>
    <td>Telefone</td>
    <td>Cidade</td>
    </tr>

    @foreach($parceiros as $p)
        <tr><td>{{$p->nome}}</td>
        <td>{{$p->email}}</td>
        <td>{{$p->telefone}}</td>
        <td>{{$p->cidade}}</td>
        </tr>
    @endforeach
</table>