<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

#Trabalho Final - Programação para Internet 2 - FATEC  PELOTAS
<h2>Trabalho 3 parte #2: Laravel / WebServices</h2>
<strong>Página do Cliente</strong>
1. Elaborar layout comercial para o site da revenda
2. Exibir na página principal os veículos marcados como destaque na tabela veículos
3. Conter campo de pesquisa por modelo do veículo. Exibir os veículos que contenham a palavra informada ou
“Não há veículos ...”.
4. Nos itens 2 e 3 (em cada veículo) adicionar link para o cliente fazer proposta
5. Ao clicar sobre o link “Fazer Proposta” exibir dados do veículo (com foto) e um formulário solicitando nome, email,
telefone e proposta do cliente.
6. Criar tabela propostas e armazenar os dados da proposta do cliente, data e id do veículo.

<strong>Área Restrita</strong>
7. Realizar o cadastro de marcas de veículos. Validar a marca para que seja única na tabela de marcas.
8. Adicionar na listagem de veículos link (botão) para o administrador destacar o veículo.
9. Conter listagem das propostas dos clientes (mostrar todos os dados da proposta com nome do cliente e
modelo do veículo). Incluir link (botão) para Responder Proposta (enviar a resposta para o e-mail do cliente).
10. Gerar gráfico relacionando dados das propostas recebidas (nº de propostas/mês...)

<h2>Trabalho 3 parte #2: Laravel / WebServices</h2>
<strong>Adicionar ao projeto os seguintes recursos:</strong>
1. Criar e executar uma migration acrescentando uma tabela no banco de dados. Utilizando
Seeders adicionar 5 registros a esta tabela.
2. Criar a Model e Controller (com a assinatura dos métodos para realizar o “CRUD”) para a tabela criada.
Criar a rota e o programa para listar os dados da tabela. Adicionar link no menu da área restrita para exibir os
dados da tabela.
3. Criar um Web Service que receba um id e retorne no formato JSON os dados do registro deste id. Retornar
status de “URL incorreta” ou “Registro Inexistente” conforme o caso. Criar o programa para consumir este
Web Service.
4. Criar um Web Service XML que receba uma palavra a ser pesquisada em campo da tabela criada. Retornar
uma lista de dados ou status de “URL incorreta” ou “Registro Inexistente” conforme o caso. Criar o programa
para consumir este Web Service.
5. Criar um relatório em PDF para listar os dados da tabela criada. O relatório deve conter uma tela inicial com
um formulário de filtro (código inicial e código final ou preço mínimo e preço máximo, por exemplo).
Adicionar link no menu da área administrativa para chamar o formulário do filtro e, posteriormente, o
relatório.
