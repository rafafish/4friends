<?php 
include("./inc/connect.inc.php"); 
session_start();
if(!isset($_SESSION["user_login"])) {
	$user = "";
}
else {
	$user = $_SESSION["user_login"];
}
$message = "";
?>
<!doctype html>
<html>
	<head>
		<title>4Friends - Find old and make new</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <script class="jsbin" src="js/jquery-1.11.1.min.js"></script>
        <script src="js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="headerMenu">
			<div id="menuWrapper">
				<div class="logo">
					<img src="./img/4Friends_logo.fw.png" border="0"/>
				</div>
				<div class="searchBox">
					<form action="search.php" method="GET" id="search">
						<input type="text" name="q" size="60" placeholder="Procurar...">
					</form>
				</div>
				<div id="menu">
					<?php  
					if (!$user) {
						echo '<a href="index.php">Página inicial</a>
							  <a href="#">Sobre</a>
							  <a href="index.php">Cadastre-se</a>
							  <a href="index.php">Entrar</a>';
					}
					else {
						echo '<a href="'.$user.'">Perfil de '.$user.' </a>
						      <a href="my_messages.php">Messages</a>
							  <a href="account.php">Conta</a>
							  <a href="logout.php">Sair</a>';
					}
					?>
				</div>
			</div>
		</div>
		<div id="wrapper">
		<br>