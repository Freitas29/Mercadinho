<?php
session_start(); 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- Button para telas pequenas -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
			<span class="navbar-toggler-icon"></span>
		</button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link">CADASTRAR PRODUTO</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="nav-link"><?php echo $_SESSION['nome'];?></p>
                </li>
            </ul>

        </div>
   
   </nav>