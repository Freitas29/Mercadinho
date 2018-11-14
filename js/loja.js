
//Variável global para poder realizar o total da compra
var soma = 0;

$(document).ready(function(){
    $('#loading').fadeOut(1000);
});


$("#btnFinalizar").click(function(){
    alert("e");
});

//Aqui trata caso ele selecione quantos produtos
$("#txtQtdProduto").on("keyup",function() {
    var valUnitario = $("#txtPrecoProduto").val();
    var qtd = $("#txtQtdProduto").val();
    $("#txtPrecoTotal").val(valUnitario*qtd);
})

//Função que buscar pelo código e retorna um JSON para alimentar cada campo no modal
$(document).ready(function(){
			$("#formCodigo").submit(function(){
				$.ajax({
					type: 'post',
					url: '../controler/ProdutoDAO.php',
					data: {
                        id  : $("input[name=txtCodigo]").val(),
					    op :	1
					},success: function(retorno){
                        var obj = JSON.parse(retorno);
                            if(obj.nome == null){
                                alert("Produto não encontrado");
                            }else{
                                $("#modalProduto").modal("show");
                                $("#txtIdProduto").val(obj.id);
                                $("#txtNomeProduto").val(obj.nome);
                                $("#txtPrecoProduto").val(obj.preco);
                            }
                    },
                    error:function(){
                        alert("Não foi possivel enviar");
                    }
				});
				return false;
			});
		});


        $("#adicionarProduto").click(function(){
            
            var novaLinha = $("<tr>");
            var colunas = "";
            var id,nome,preco,qtd,precoTotal;
            id = $("#txtIdProduto").val();
            nome = $("#txtNomeProduto").val();
            preco = $("#txtPrecoProduto").val();
            qtd = $("#txtQtdProduto").val();
            precoTotal = $("#txtPrecoTotal").val();
            if(qtd == 0 || qtd == ""){
                $("#qtdTexto").hide();
                $("#erroQtd").show();
            }else{
                $("#qtdTexto").show();
                $("#erroQtd").hide();
                colunas += "<td>"+id+"</td>";
                colunas += "<td>"+nome+"</td>";
                colunas += "<td>"+preco+"</td>";
                colunas += "<td>"+qtd+"</td>";
                colunas += "<td data-nome='"+precoTotal+"'>"+precoTotal+"</td>";
                colunas += "<td><button class='btn btn-danger' onclick='removerLinha(this)'>&times;</button></td>";
                colunas += "</tr>";
                novaLinha.append(colunas);
                $("#tabelaProduto").append(novaLinha);

                //Para realizar o calculo da compra
                resu = parseFloat(precoTotal);
                soma = soma+resu;
                $("#totalCompra").text(soma);
                    
            }
        });

        //Remove a linha em que estiver clicado
        function removerLinha(dado){
            //Pega o valor da linha retirada
            var valorTirar = $(dado).closest('tr').find('td[data-nome]').data('nome');
            var tirar = parseFloat(valorTirar);
            //retira do total da compra
            soma = soma - valorTirar;
            $("#totalCompra").text(soma);
            //Remove a linha
            var linha = $(dado).closest('tr');
            linha.fadeOut(500,function(){
                linha.remove;
            });
            
        }

        $('#modalProduto').on('hidden.bs.modal', function (e) {
               $("#txtQtdProduto").val(0);
          });

       
       
           
        
        $("#calcular").click(function(){
            $('#tabelaProduto tbody tr').each(function(){ 
 
                var valor = $(this).find("#qtd").text();

            });
        });