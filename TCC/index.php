<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="utf-8">
        <link rel="shortcut icon" href="logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="logo/logo_icon.ico" type="image/x-icon" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>Reisinger Calçados</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		

	</head>

<body class="fundologin">
    
	<?php include "base/mensagens.php"; ?>     
    
<div class="container">

        <div class="titlogin">
		<div class="tit1">REISINGER CALÇADOS</div>
		<div class="tit2">Sistema de Controle da Loja</div>
		</div>
		<div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
			
            <form class="form-signin" action="base/validaacesso.php" method="POST">
			
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" name="usuario" class="form-control" placeholder="Digite o usuário" required autofocus>
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Digite a senha" required>
                
				<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Lembre-me
                    </label>
                </div>
               
			   <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
           
		   </form><!-- /form -->
           
			<a href="base/recuperarlogin.php" class="forgot-password">
                Esqueceu a senha?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->



</body>
<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
</html>