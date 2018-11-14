<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    include_once 'header.php';
    ?>

    <div class="container">
        <div class="row">
            <form class="form-group col-md-12" id="formProdutos">
                <div class="col-sm-12">
                  <label for="txtProduto">Produto</label>
                  <input type="text" name="txtProduto" id="txtProduto" autofocus required class="form-control" placeholder="Informe o nome do produto" aria-describedby="ajudaProduto">
                  <small id="ajudaProduto" class="text-muted">Informe o nome do produto</small>
                </div>

                <div class="col-sm-12  mt-3">
                    <label for="txPreco">Preço do produto</label>
                    <input type="text" class="form-control" name="txtPreco" required id="txtPreco" placeholder="Informe preço do produto" aria-describedby="ajudaPreco">
                    <small id="ajudaPreco" class="text-muted">Informe o preço</small>
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="txCategoria">Categoria do produto</label>
                    <input type="text" class="form-control" name="txtCategoria" required id="txCategoria" placeholder="Informe categoria do produto" aria-describedby="ajudaCat">
                    <small id="ajudaCat" class="text-muted">Informe a categoria</small>
                </div>

                <div class="col-sm-2 mt-3">
                   <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>

            </form>
            
        </div>
    </div>

     <div class="modal" tabindex="-1" role="dialog" id="modalProdutoCadastrado">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Produto Cadastrado?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row  justify-content-center align-items-center">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert" id="cadastrado">
                                <strong>Cadastrado!</strong> 
                            </div>
                            <div class="alert alert-danger" role="alert" id="NaoCadastrado">
                                <strong>Não Cadastrado!</strong> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</body>
<script src="../js/cadastraProduto.js"></script>
</html>