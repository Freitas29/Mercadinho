<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gráficos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
include_once 'header.php';

?>

<canvas id="grafico"></canvas>
    <!-- Quando a página está carregando -->
    <div class="container-fluid" id="loading" style="position:absolute;z-index:999;background-color:#fff;width:100%;min-height:100%;height:auto;top:0;">
            <div class="row justify-content-center align-items-center">
                    <img class="img-fluid mr-5" src="../img/gifLoad.gif">
                    
                    
            </div>
    </div>
<!--Incluindo a biblioteca de gráficos-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="../js/graficos.js"></script>

</body>
</html>