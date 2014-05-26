<?php
include ("./inc/header.inc.php");
if ($user) {

}
else
{
	die("Você deve entrar na sua conta para poder acessar as informações de conta!");
}

$update_password = @$_POST['update_password'];

//variaveis de senha
$oldpassword = strip_tags(@$_POST['oldpassword']);
$newpassword = strip_tags(@$_POST['newpassword']);
$repeat_password = strip_tags(@$_POST['newpassword2']);

if ($update_password){
    //se o formulario foi submetido
    $password_query = mysql_query("SELECT * FROM users WHERE username='$user'");
    while($row = mysql_fetch_assoc($password_query)) {
        $db_password = $row['password'];

        $oldpassword_md5 = md5($oldpassword);

        if ($oldpassword_md5 == $db_password){
            if ($newpassword == $repeat_password) {
                //muda a senha
                // md5 na nova senha
                $newpassword_md5 = md5($newpassword);
                $password_update_query = mysql_query("UPDATE users SET password='$newpassword_md5' WHERE username='$user'");
                echo "Senha alterada com sucesso!";
            }
            else{
                echo "A nova senha não confere, digite novamente";
            }
        }
        else
        {
            echo "Senha incorreta!";
        }
    }
}

// nome, sobrenome e biografia

$update_info = @$_POST['update_info'];

$info_query = mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$user'");
$get_row = mysql_fetch_assoc($info_query);
$db_firstname = $get_row['first_name'];
$db_lastname = $get_row['last_name'];
$db_bio = $get_row['bio'];

if ($update_info){
    $firstname = strip_tags(@$_POST['fname']);
    $lastname = strip_tags(@$_POST['lname']);
    $bio = @$_POST['bio'];

    if (strlen($firstname) < 3) {
        echo "O seu nome deve conter no mínimo 3 caracteres";
    }
    else{
        if (strlen($lastname) < 3){
            echo"O seu sobrenome deve conter no mínimo 3 caracteres";
        }
        else {
            //codifica a variavel bio para que seja gravado com acento no banco de dados.
            $bio = utf8_decode($bio);
            //envia os dados do form para o banco de dados
            $info_submit_query = mysql_query("UPDATE users SET first_name = '$firstname', last_name='$lastname', bio='$bio' WHERE username='$user'");
            echo "As informações do seu perfil foram alteradas com sucesso!";
            header("Location: $user");
        }
    }
}

//verifica se houve um upload de foto
$check_pic_query = mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
$get_pic_row = mysql_fetch_assoc($check_pic_query);
$profile_pic_db = $get_pic_row['profile_pic'];
if ($profile_pic_db == "") {
    $profile_pic = "img/default_pic.jpg";
}
else {
    $profile_pic = "userdata/profile_pics/$profile_pic_db";
}

//carregar imagem de perfil
if (isset($_FILES['profilepic'])) {
    if (((@$_FILES["profilepic"]["type"] == "image/jpeg") || (@$_FILES["profilepic"]["type"] == "image/png") || (@$_FILES["profilepic"]["type"] == "image/gif")) && ($_FILES["profilepic"]["size"] < 1048576)) {
        $chars = "abcdefghijklmnopqrstuvxywzABCDEFGHIJKLMNOPQRSTUVXYZW0123456789";
        $rand_dir_name = substr(str_shuffle($chars),0,15);
        mkdir("userdata/profile_pics/$rand_dir_name");
        $profile_pic_name = @$_FILES["profilepic"]["name"];

        if (file_exists("userdata/profile_pics/$rand_dir_name/$profile_pic_name")) {
            echo "$profile_pic_name já existe";
        }
        else {
            move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/$profile_pic_name");
            //echo "Foto do perfil carregada em: /userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
            $profile_pic_query = mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
            header("Location: account.php");
        }

    }
    else{
        echo "Arquivo Inválido. O arquivo deve ser uma imagem (.jpg, .jpeg, .png ou .gif) e ter menos que 1MB";
    }
}
    else {

    }
?>


<h2>Edite os dados de sua conta</h2><br />
<hr /><br />
<p>Adicione uma foto ao seu perfil</p>
<form action="" method="POST" enctype="multipart/form-data">
    <img src="<?php echo $profile_pic; ?>" width="70" /><br />
    <input type="file" name="profilepic"/><br />
    <input type="submit" name="uploadpic" value="Carregar foto"/>
</form>
<hr /><br />
<form action="account.php" method="POST">
<p>Mudar senha</p>
Sua senha antiga: <input type="password" name="oldpassword" id="oldpassword" size="40"><br />
Sua nova senha: <input type="password" name="newpassword" id="newpassword" size="40"><br />
Repita sua nova senha: <input type="password" name="newpassword2" id="newpassword2" size="40"><br /><br />
<input type="submit" name="update_password" id="update_password" value="Atualizar">
<hr />
<br />
<p>Atualize seus dados</p>
Nome: <input type="text" name="fname" id="fname" size="40" value="<? echo $db_firstname; ?>"><br />
Sobrenome: <input type="text" name="lname" id="lname" size="40" value="<? echo $db_lastname; ?>"><br />
Sobre você: <textarea name="bio" id="bio" rows="7" cols="60"><? echo utf8_encode($db_bio); ?></textarea><br />
<input type="submit" name="update_info" id="update_info" value="Atualizar">
<hr /><br />
</form>