<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../libs/bootstrap/dist/css/bootstrap.css"/>
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once '../model/Usuario.php';
        include_once '../model/Produto.php';
        include_once '../controler/ProdutoDAO.php';
        //Inclui cabeçalho
        include_once 'header.php';
        $usu = new Usuario();
        $id =  $_SESSION['login'];
        $nome =  $_SESSION['nome'];
       
    ?>

    <!-- Barra de pesquisar -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline">
                <input class="form-control col-md-11" type="search" placeholder="Pesquise por um produto caso não saiba o código" aria-label="Search">
                <button class="btn btn-outline-primary col-md-1 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>

    <!-- Quando a página está carregando -->
     <div class="container-fluid" id="loading" style="position:absolute;z-index:999;background-color:#fff;width:100%;min-height:100%;height:auto;top:0;">
            <div class="row justify-content-center align-items-center">
                    <img class="img-fluid mr-5" src="../img/logo.png">
                    <div style="position:relative;top:120px;left:-140px;">
                    <i class="fas fa-spinner fa-spin fa-2x" id="iconLoad"></i>
                    </div>
            </div>
    </div>

    <!--Dados quando digita o código -->
    <div class="container">
        <div class="jumbotron mt-2">
            <div class="row">
                <form class="form-group col-md-12" id="formCodigo">
                    <input class="form-control col-md-6 mr-3 ml-auto" autofocus placeholder="Informe o código" name="txtCodigo" pattern="[0-9]" title="Informe apenas números">
                    <button class="btn btn-primary float-right mr-3 mt-2">Inserir</button>
                </form>
            </div>
            <!-- Dados da compra -->
            <table class="table table-dark" id="tabelaProduto">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço unitário</th>
                        <th scope="col" id="qtd">Quantidade</th>
                        <th scope="col" id="precoTotal">Total</th>
                    </tr>
                </thead>
                <tbody id="dadosTable">
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-4 ml-auto">
                    <div class="card bg-primary text-white text-center p-3">
                    <blockquote class="blockquote">
                        <p>R$: <label class="mb-0" id="totalCompra">00,00</label></p>
                    </blockquote>
                
                     </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para quando adicionar um produto -->
     <div class="modal" tabindex="-1" role="dialog" id="modalProduto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dados Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <small class="form-text text-muted">Codigo do Produto</small>
                        <input class="form-control" readonly id="txtIdProduto">
                    </div>
                    <div class="col-md-6">
                        <small class="form-text text-muted">Nome do Produto</small>
                        <input class="form-control" readonly id="txtNomeProduto">
                    </div>
                    <div class="col-md-6">
                        <small class="form-text text-muted">Preço do Produto</small>
                        <input class="form-control" readonly id="txtPrecoProduto">
                    </div>
                    <div class="col-md-6">
                        <small class="form-text text-muted" id="qtdTexto">Quantidade do Produto</small>
                        <small class="form-text" id="erroQtd" style="display:none;color:red">Selecione uma quantidade</small>
                        <input class="form-control" id="txtQtdProduto" autofocus>
                    </div>
                    <div class="col-md-6">
                        <small class="form-text text-muted">Preço total</small>
                        <input class="form-control" readonly id="txtPrecoTotal">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary" id="adicionarProduto">Incluir</button>
            </div>
            </div>
        </div>
    </div>

    
</body>
<script src="../libs/jquery/dist/jquery.min.js" ></script>
<script src="../libs/bootstrap/dist/js/bootstrap.js"></script>
<script src="../js/loja.js"></script>

</html>
