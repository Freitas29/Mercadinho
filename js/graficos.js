function gerarGrafico() {
    $.ajax({
        type: 'post',
        url: '../controler/graficos.php',
        success: function (retorno) {
            //Separando os JSON para dois arrays 
            var sep = retorno.split("]");
            //Pegando os arrays e add a chave que foi retirada
            nomC = sep[0] + "]";
            qtdC = sep[1] + "]";

            //Transformando o json em objeto
            var nomeP = JSON.parse(nomC);
            var qtdP = JSON.parse(qtdC);
          
            //Transformando em array
            const nomeProduto = Object.keys(nomeP).map(i => nomeP[i]);
            const qtdProduto = Object.keys(qtdP).map(i => qtdP[i]);
            //Pegando o canvas
            let primeiroGrafico = document.getElementById('grafico').getContext('2d');
            var produtos = nomeProduto;
            var resultadoVendas = qtdP;

            var cores = [];
            
            for(i = 0; i <= produtos.length;i++){
                cores[i] = gera_cor();
            }
            
            //Instânciando o objeto e escolhendo o tipo
            let vendas = new Chart(grafico, {
                type: 'horizontalBar',
                
                data: {
                    labels: produtos,

                    datasets: [
                        
                        {
                            label: 'Vendas',
                            data: resultadoVendas,
                            backgroundColor:cores,
                            borderColor: cores,

                        }
                    ]
                },
                options: {
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                        titleMarginBottom: 10
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }


            });
        },
        error: function () {
            alert("Não foi possivel enviar");
        }
    });
    return false;
}

gerarGrafico();

function gera_cor(){
    var hexadecimais = '0123456789ABCDEF';
    var cor = '#';
  
    // Pega um número aleatório no array acima
    for (var i = 0; i < 4; i++ ) {
    //E concatena à variável cor
        cor += hexadecimais[Math.floor(Math.random() * 16)];
    }
    return cor;
}

