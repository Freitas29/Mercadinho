function gerarGrafico() {
    $.ajax({
        type: 'post',
        url: '../controler/graficos.php',
        success: function (retorno) {
            alert(retorno);
            //Transformando o json em objeto
            var obj = JSON.parse(retorno);
            console.log(obj);
            //Transformando em array
            const nomeProduto = Object.keys(obj).map(i => obj[i]);
            //Pegando o canvas
            let primeiroGrafico = document.getElementById('grafico').getContext('2d');
            var produtos = nomeProduto;
            var resultadoVendas = [50, 30, 25]
            //Instânciando o objeto e escolhendo o tipo
            let vendas = new Chart(grafico, {
                type: 'bar',
                data: {
                    labels: produtos,

                    datasets: [
                        {
                            label: 'Vendas',
                            data: resultadoVendas
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