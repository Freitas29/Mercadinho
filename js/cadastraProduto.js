$(document).ready(function(){
    $("#formProdutos").on("submit",function(){
        $.ajax({
            type: 'post',
            url: '../controler/ProdutoDAO.php',
            data: {
                nome  : $("input[name=txtProduto]").val(),
                qtd  : $("input[name=txtQuantidade]").val(),
                preco  : $("input[name=txtPreco]").val(),
                categoria  : $("input[name=txtCategoria]").val(),
                op :	2
            },success: function(retorno){
               // var obj = JSON.parse(retorno);
                //$("#modalProduto").modal("show");
                //$("#txtIdProduto").val(obj.id);
                //$("#txtNomeProduto").val(obj.nome);
                //$("#txtPrecoProduto").val(obj.preco);
                $("#txtProduto").val("");
                $("#txtQuantidade").val("");
                $("#txtPreco").val("");
                $("#txtCategoria").val("");
                
            },
            error:function(retorno){
                alert(retorno);
                alert("Não foi possivel enviar");
            }
        });
    return false;
    });
});