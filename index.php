<?php include ("./inc/header.inc.php"); ?>
<?php 
$reg = @$_POST['reg'];
//declaracao de variavel para previnir erro
$fn = ""; // Nome
$ln = ""; // Sobrenome
$un = ""; // username
$em = ""; // email
$em2 = ""; // email2
$pswd = ""; //password
$pswd2 = ""; //password2
$d = ""; // data de cadastro
$u_check = ""; //verifica se usuario existe
//form de cadastro
$fn = strip_tags(@$_POST['fname']); // Nome
$ln = strip_tags(@$_POST['lname']); // Sobrenome
$un = strip_tags(@$_POST['username']); // username
$em = strip_tags(@$_POST['email']); // email
$em2 = strip_tags(@$_POST['email2']); // email2
$pswd = strip_tags(@$_POST['password']); //password
$pswd2 = strip_tags(@$_POST['password2']); //password2
$d = date("Y-m-d"); // Ano-Mes-Dia

if ($reg) {
	if ($em=$em2) {
		//verifica se ja existe
		$u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
		//conta quantos registro teve do username
		$check = mysql_num_rows($u_check);
		//verifica se o email ja existe no banco de dados
		$e_check = mysql_query("SELECT email FROM users WHERE email='$em'");
		//conta o numero de linhas retornadas de email
		$email_check = mysql_num_rows($e_check);
		if ($check==0) {
			if($email_check==0) {
			//verifica se todos os campos foram preenchidos
			if($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
				//verifica se o password foi digitado corretamente
				if($pswd==$pswd2) {
					//verifica se o tamanho do username, nome e sobrenome nao atingiu o limite de 25 caracteres
					if(strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
						echo "O limite máximo do nome de usuário, nome e sobrenome é de 25 caracteres";
					}
					else
					{
						if(strlen($pswd)>30||strlen($pswd)<5) {
							echo "Sua senha deve ter entre 5 e 30 caracteres";
						}
						else
						{
							$pswd = md5($pswd);
							$pswd2 = md5($pswd2);
							$query = mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d', '0', '', '','')") or die(mysql_error());
							die ("<h2>Bem-vindo ao 4Friends</h2>Entre na sua conta para iniciar...");
						}
					}
				}
				else {
					echo "A sua senha não confere, digite novamente";
				}
			}
			else {
				echo "Por favor preencha todos os campos";
			}
		}
		else {
			echo "Um usuário ja esta usando este endereço de e-mail";
		}
		}
		else {
			echo "Este nome de usuário já esta sendo utilizado. Por favor escolha outro.";
		}
	}
	else {
		echo "Seu E-mail não confere, digite novamente";
	}
}

//Codigo de login do usuario
if(isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filtra tudo que seja numero e letra
	$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filtra tudo que seja numero e letra
	$password_login_md5 = md5($password_login);
	$sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1"); //busca o id do usuario
	// verifica se o usuario existe
	$userCount = mysql_num_rows($sql); // conta o numero de linhas retornadas na query
	if ($userCount == 1) {
		while($row = mysql_fetch_array($sql)) {
			$id = $row["id"];
		}
		$_SESSION["user_login"] = $user_login;
		header("location: home.php");
		exit();
	}
	else {
		echo "Informações incorretas, tente novamente.";
		exit();
	}
}
 ?>
		<div style="width: 850px; margin: 0px auto 0px auto;">
		<table>
			<tr>
				<td width="60%" valign="top">
					<h2>Já tem uma conta? Entre abaixo</h2>
					<form action="index.php" method="POST">
						<input type="text" name="user_login" size="25" placeholder="Nome de usuário" /><br /><br />
						<input type="text" name="password_login" size="25" placeholder="Senha" /><br /><br />
						<input type="submit" name="login" value="Entrar" />
					</form>	
				</td>
				<td width="40%" valign="top">
					<h2>Abra uma conta</h2>
					<form action="index.php" method="POST">
						<input type="text" name="fname" size="25" placeholder="Nome" /><br /><br />
						<input type="text" name="lname" size="25" placeholder="Sobrenome" /><br /><br />
						<input type="text" name="username" size="25" placeholder="Nome de usuário" /><br /><br />
						<input type="text" name="email" size="25" placeholder="E-mail" /><br /><br />
						<input type="text" name="email2" size="25" placeholder="E-mail (confirmar)" /><br /><br />
						<input type="text" name="password" size="25" placeholder="Senha" /><br /><br />
						<input type="text" name="password2" size="25" placeholder="Senha (confirmar)" /><br /><br />
						<input type="submit" name="reg" value="Cadastrar!" />
					</form>
				</td>
			</tr>
		</table>
<?php include ("./inc/footer.inc.php"); ?>