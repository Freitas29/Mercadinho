<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./libs/bootstrap/dist/css/bootstrap.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center mt-5" >
        <form class="md-6" id="formLogin">
            <div class="sm-12">
                <img class="img-fluid" src="./img/logo.png">
            </div>
            <div class="form-group sm-12">
                <input class="form-control input-md" required name="txtDadosFunc" id="txtDados">
                <small class="text-form text-muted">Informe seu nome ou código de funcionário</small>
            </div>

            <div class="form-group sm-12">
                <input class="form-control input-md" type="password" required name="txtSenhaFunc" id="txtSenha">
            </div>
            <button class="btn btn-primary btn-md" id="enviaForm">Entrar</button>
        </form>
        </div>
    </div>

    <div class="container-fluid" id="loading" style="position:absolute;z-index:999;background-color:#fff;width:100%;min-height:100%;height:auto;top:0;">
            <div class="row justify-content-center align-items-center">
                    <img class="img-fluid mr-5" src="./img/logo.png">
                    <div style="position:relative;top:120px;left:-140px;">
                    <i class="fas fa-spinner fa-spin fa-2x" id="iconLoad"></i>
                    </div>
            </div>
    </div>

</body>

    <script src="./libs/jquery/dist/jquery.min.js" ></script>
    <script src="./libs/bootstrap/dist/js/bootstrap.js" ></script>
<script>


$(document).ready(function(){
    $('#loading').fadeOut(1500);
			$("#formLogin").submit(function(){
				$.ajax({
					type: 'post',
					url: './model/UsuarioDAO.php',
					data: {
					nome  : $("input[name=txtDadosFunc]").val(),
					senha :	$("input[name=txtSenhaFunc]").val()
					},success: function(retorno){
                        if(retorno != false){
                            window.location.href = "./view/loja.php";
                        }else{
                            $("#txtSenha").css("border","1px solid red");
                            $("#txtDados").css("border","1px solid red");
                        }
                        
                    },
                    error:function(){
                        alert("Não foi possivel enviar");
                    }
				}).done(function(){
                    $('#modalLogin').modal("hide");
                });
				return false;
			});
		});
</script>
</html>