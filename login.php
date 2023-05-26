<?php
    session_start();
    if(isset($_SESSION['$login_err'])){
        $login_err = $_SESSION['$login_err'];
        unset($_SESSION['$login_err']);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BookZin - Login</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./Assets/css/style.css" />
</head>
<body>
	<div id="opaco"></div>
	<main>
        <?php if (!empty($login_err)): ?>
            <script>console.log('<?php echo $login_err; ?>');</script>
        <?php endif; ?>
		<section id="content">
			<!-- Aqui vai todo o formulario de Login -->
			<section id="content-phrase">
				<!-- Aqui vai mostrar uma frase diferente toda vez que abrir a pagina -->
				<section id="phrase">
					<div id="box-phrase">
						<!-- TODO Criar um sistema para ficar mudando as frases sempre que acessar a pagina! -->
						<!-- TODO Criar o json com as frases -->
						<p id="phrase-txt">"A memória é o essencial, visto que a literatura é feita de sonhos e os sonhos fazem-se combinando recordações"</p>
						<p id="phrase-author"><strong>Jorge Luís Borges</strong> (1899-1986)</p>
					</div>
				</section>
			</section>
			<!-- Formulário de login -->
			<section id="content-form">
				<div id="locker">
					<img src="./Assets/image/locker.png">
				</div>
				<div id="container-form">
					<form action="./main/init/login.php" method="post" >
						<? $_GET['login_err']; ?>
						<input type="text" name="usrText" id="usrText" placeholder="Usuário" required />
						<input type="password" name="usrPass" id="usrPass" placeholder="Senha" required />
						<div id="links">
							<div id="remember-login">
								<input type="checkbox" name="usrCheck" id="usrCheck" /> <label for="usrCheck"> Lembrar Login</label>
							</div>
							<div id="forgot">
								<a href="#">Esqueci a senha</a>
							</div>
						</div>
						<input type="submit" name="usrSubmit" id="usrSubmit" value="Entrar" />
					</form>
				</div>
			</section>
		</section>
	</main>
</body>
</html>