$(document).ready(function(){
    $("#formProdutos").on("submit",function(){
        $.ajax({
            type: 'post',
            url: '../controler/CadastraProduto.php',
            data: {
                nome  : $("input[name=txtProduto]").val(),
                preco  : $("input[name=txtPreco]").val(),
                categoria  : $("input[name=txtCategoria]").val(),
                op :	1
            },success: function(retorno){
                $("#txtProduto").val("");
                $("#txtPreco").val("");
                $("#txtCategoria").val("");
                $("#modalProdutoCadastrado").modal("show");
                $("#NaoCadastrado").hide();
            },
            error:function(retorno){
                $("#modalProdutoCadastrado").modal("show");
                $("#NaoCadastrado").show();
                $("#cadastrado").hide();
            }
        });
    return false;
    });
});

$('#modalProdutoCadastrado').on('hidden.bs.modal', function (e) {
    $("#txtProduto").focus();
});