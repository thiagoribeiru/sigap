<?require_once("config.php");?>
<html>
	<head>
		<title>SIGAP 4.0</title>
		<link type="text/css" href="css/login.css" rel="stylesheet">
		<link type="text/css" href="css/pront.css" rel="stylesheet">
		<link href="images/favicon.png" rel="shortcut icon">
		<script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="scripts/func_js.js" type="text/javascript"></script>
		<script src="scripts/scripts.js" type="text/javascript"></script>
	</head>
	<body>
		<?require_once("pront.php");?>
		<div id="container">
			<img src="images/logo_login.png" id="logo" />
			<form id="formlogin">
				<div id="antInput">
					<div class="input">
						<div><img src="images/usuario.png" /></div>
						<input type="email" name="usuario" placeholder="Usuário" require />
					</div>
					<div class="input">
						<div><img src="images/senha.png" /></div>
						<input type="password" name="senha" placeholder="Senha" require />
					</div>
					<span id="erroSenha">Usuário ou senha inválidos ou desativados!</span><br>
					<span id="esqueceuSenha"><a href="">Esqueceu a senha?</a></span>
					<div id="botaoLogin"><span>Login</span></div>
				</div>
			</form>
		</div>
	</body>
</html>