<?php
session_start(); 
?>
    <link rel="stylesheet" href="../libs/bootstrap/dist/css/bootstrap.css"/>
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
    <script src="../libs/jquery/dist/jquery.min.js" ></script>
    <script src="../libs/bootstrap/dist/js/bootstrap.js"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- Button para telas pequenas -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
			<span class="navbar-toggler-icon"></span>
		</button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./loja.php">LOJA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cadastraProduto.php">CADASTRAR PRODUTO</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="nav-link"><?php echo $_SESSION['nome'];?></p>
                </li>
            </ul>

        </div>
   
   </nav>