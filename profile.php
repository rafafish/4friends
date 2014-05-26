<?php 
include("./inc/header.inc.php");
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
		//verifica se o usuario existe
		$check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
		if (mysql_num_rows($check)==1) {
			$get = mysql_fetch_assoc($check);
			$username = $get['username'];
			$firstname = $get['first_name'];
		}
		else {
			echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost:8080/amigos/index.php\">";
			exit();
		}
	}
}

$post = @$_POST['post'];
if ($post != "") {
    $date_added = date("Y-m-d");
    $added_by = $user;
    $user_posted_to = $username;
    $sqlCommand = "INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')";
    $query = mysql_query($sqlCommand) or die(mysql_error());
}

//verifica se houve um upload de foto
$check_pic_query = mysql_query("SELECT profile_pic FROM users WHERE username='$username'");
$get_pic_row = mysql_fetch_assoc($check_pic_query);
$profile_pic_db = $get_pic_row['profile_pic'];
if ($profile_pic_db == "") {
    $profile_pic = "img/default_pic.jpg";
}
else {
    $profile_pic = "userdata/profile_pics/$profile_pic_db";
}


/*//Mostra os posts
    $posts = "";
 	$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
 	while($row = mysql_fetch_assoc($getposts)) {
 		$id = $row['id'];
 		$body = $row['body'];
 		$date_added = $row['date_added'];
 		$added_by = $row['added_by'];
 		$user_posted_to = $row['user_posted_to'];
 		$posts = $posts." <div class='profilePost'><div class='posted_by'><a href='$added_by'>$added_by</a> - $date_added - </div>&nbsp;&nbsp;$body<br /></div>";
 	}*/

//adicionar como amigo

 if (isset($_POST['addfriend'])) {
     $friend_request = $_POST['addfriend'];
     $user_to = $username;
     $user_from = $user;

     if ($user_to == $user) {
         $message = "Não é possível adicionar você mesmo como amigo!<br />";
     }
     else {
         $create_request = mysql_query("INSERT INTO friend_requests VALUES('','$user_from','$user_to') ");
         $message = "Seu pedido de amizade foi enviado com sucesso <br />";
     }

 }

//Biografia do usuário
 $about_query = mysql_query("SELECT bio FROM users WHERE username='$username'");
 $get_result = mysql_fetch_assoc($about_query);
 $about_the_user = $get_result['bio'];
//

//Verifica se já é amigo, se sim aparece botão de exluir se não aparece botão de adicionar
 $friendsArray = "";
 $countFriends = "";
 $friendsArray12 = "";
 $selectFriendsQuery = mysql_query("SELECT friend_array FROM users WHERE username='$username'");
 $friendRow = mysql_fetch_assoc($selectFriendsQuery);
 $friendsArray = $friendRow['friend_array'];
 if ($friendsArray != "") {
     $friendsArray = explode(",",$friendsArray);
     $countFriends = count($friendsArray);
     $friendsArray12 = array_slice($friendsArray, 0, 12);
 }
 $i = 0;

 if (is_array($friendsArray) && in_array($user,$friendsArray)) {
     $addAsFriend = "<input type='submit' name='removefriend' value='Excluir Amigo'>";
 }
 else {
     $addAsFriend = "<input type='submit' name='addfriend' value='Adicionar amigo'>";
 }
 //

//Mostra amigos
$showFriends = "";
if ($countFriends != 0) {
    foreach ($friendsArray12 as $key => $value) {
        $i++;
        $getFriendQuery = mysql_query("SELECT * FROM users WHERE username='$value'");
        $getFriendRow = mysql_fetch_assoc($getFriendQuery);
        $friendUsername = $getFriendRow['username'];
        $friendProfilePic = $getFriendRow['profile_pic'];

        if ($friendProfilePic == "") {
            $showFriends = $showFriends."<a href='$friendUsername'><img src='img/default_pic.jpg' alt='Perfil de $friendUsername' title='Perfil de $friendUsername' height='50' width='40' style='padding-right: 6px;'></a>";
        }
        else {
            $showFriends = $showFriends."<a href='$friendUsername'><img src='userdata/profile_pics/$friendProfilePic' alt='Perfil de $friendUsername' title='Perfil de $friendUsername' height='50' width='40' style='padding-right: 6px;'></a>";
        }

    }
}
else {
    $showFriends = "$username ainda não tem nenhum amigo no 4Friends";
}

 // excluir amigo
 if (@$_POST['removefriend']) {
     $add_friend_check_user = mysql_query("SELECT * FROM users WHERE username='$user'");
     $get_friend_row_user = mysql_fetch_assoc($add_friend_check_user);
     $friend_array_user = $get_friend_row_user['friend_array'];

     $add_friend_check_username = mysql_query("SELECT * FROM users WHERE username='$username'");
     $get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
     $friend_array_username = $get_friend_row_username['friend_array'];

     $user_comma_first = ",".$user;
     $user_comma_last = $user.",";

     $username_comma_first = ",".$username;
     $username_comma_last = $username.",";

// remove amigo do usuario logado
     if (strstr($friend_array_user,$username_comma_first)) {
         $new_friend_array_user = str_replace($username_comma_first,"",$friend_array_user);
     }
     else if (strstr($friend_array_user,$username_comma_last)) {
         $new_friend_array_user = str_replace($username_comma_last,"",$friend_array_user);
     }

//remove amigo do usuario dono do perfil
     if (strstr($friend_array_username,$user_comma_first)) {
         $new_friend_array_username = str_replace($user_comma_first,"",$friend_array_username);
     }
     else if (strstr($friend_array_username,$user_comma_last)) {
         $new_friend_array_username = str_replace($user_comma_last,"",$friend_array_username);
     }

     $remove_friend_query_user = mysql_query("UPDATE users SET friend_array='$new_friend_array_user' WHERE username='$user'");
     $remove_friend_query_username = mysql_query("UPDATE users SET friend_array='$new_friend_array_username' WHERE username='$username'");

     $message = "Você desfez a amizade com $username";

     header("Location: $username");
 }

if (isset($_POST['sendmsg'])) {
    header("Location: send_msg.php?u=$username");
}

?>
<script type="text/javascript" src="js/auto_post.js"></script>
<script type="text/javascript" src="js/send_post.js"></script>
<div class="postForm">
        <textarea id="post" name="post" rows="5" cols="94" placeholder="O que você esta pensando?" style="margin-top: 2px; background-color: #FFFFFF; border-top: 1px solid #E5E6E9; border-right: 1px solid #DFE0E4; border-left: 1px solid #DFE0E4; border-bottom: 1px solid #D0D1D5; outline: none; padding-left: 2px; padding-top: 2px; font-size: 12px;"></textarea>
        <input id="user_from" type="hidden" name="user_from" value="<? echo $user; ?>">
        <input id="user_to" type="hidden" name="user_to" value="<? echo $username; ?>">
        <input id="form_post" type="submit" name="send" value="Publicar" onclick="javascript:send_post()" style="float: right; height: 77px; width: 65px;">
        <!--        <input type="submit" name="send" value="Publicar" style="float: right; height: 77px; width: 65px;">-->
</div>

<div id="posts">

</div>

<?// echo $posts; ?>

<div class="textHeader">PERFIL DE <?php echo $username; ?></div>
 <img src="<?php echo $profile_pic; ?>" heigth="250" width="200" alt="Perfil de <?php echo $username; ?>" title="Perfil de <?php echo $username; ?>" />
 <br />
<form action="<?php echo $username; ?>" method="POST">
    <? echo $message; ?>
    <? echo $addAsFriend; ?>
    <input type="submit" name="sendmsg" value="Enviar mensagem"/>
</form>
 <div class="profileLeftSideContent">
     <? echo utf8_encode($about_the_user); ?>
 </div>
<div id="feedback">

</div>
 <div class="textHeader">AMIGOS DE <?php echo $username; ?></div>
 <div class="profileLeftSideContent">
     <? echo $showFriends; ?>
 </div>