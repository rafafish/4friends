<?php include ("inc/header.inc.php"); ?>
<?php
// procura pedido de amizade
$friendRequests = mysql_query("SELECT * FROM friend_requests WHERE user_to='$user'") or die(mysql_error());
$numrows = mysql_num_rows($friendRequests);
if ($numrows == 0) {
    echo "Você não tem nenhum pedido de amizade pendente.";
}
else {
    while ($get_rows = mysql_fetch_assoc($friendRequests)) {
        $id = $get_rows['id'];
        $user_to = $get_rows['user_to'];
        $user_from = $get_rows['user_from'];

        echo "$user_from quer seu seu amigo<br />";


if (isset($_POST['acceptrequest'.$user_from])) {
    //pega o array de amigos do usuario logado
    $get_friend_check = mysql_query("SELECT friend_array FROM users WHERE username='$user'");
    $get_friend_row = mysql_fetch_assoc($get_friend_check);
    $friend_array = $get_friend_row['friend_array'];
    $friend_array_explode = explode(",",$friend_array);
    $friend_array_count = count($friend_array_explode);


    //pega o array de amigos do usuario que enviou o pedido de amizade
    $get_friend_check_friend = mysql_query("SELECT friend_array FROM users WHERE username='$user_from'");
    $get_friend_row_friend = mysql_fetch_assoc($get_friend_check_friend);
    $friend_array_friend = $get_friend_row_friend['friend_array'];
    $friend_array_explode_friend = explode(",",$friend_array_friend);
    $friend_array_count_friend = count($friend_array_explode_friend);

    if ($friend_array == "") {
        $friend_array_count = count(null);
    }
    if ($friend_array_friend == "") {
        $friend_array_count_friend = count(null);
    }

    if ($friend_array_count == null) {
        $add_friend_query = mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_from') WHERE username='$user'");
        }
    else {
        if ($friend_array_count >= 1) {
            $add_friend_query = mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,',$user_from') WHERE username='$user'");
        }
    }

    if ($friend_array_count_friend == null) {
        $add_friend_query = mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_to') WHERE username='$user_from'");
    }
    else {
        if ($friend_array_count_friend >=1) {
            $add_friend_query = mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,',$user_to') WHERE username='$user_from'");
        }
    }

    $delete_request = mysql_query("DELETE FROM friend_requests WHERE user_to='$user_to' && user_from='$user_from'");
    header("Location: friend_requests.php");
    echo "$user_from e você se tornaram amigos.";
}
    if (isset($_POST['ignorerequest'.$user_from])) {
        $ignore_request = mysql_query("DELETE FROM friend_requests WHERE user_to='$user_to' && user_from='$user_from'");
        header("Location: friend_requests.php");
        echo "O pedido de amizade de $user_from foi rejeitado.";
    }
?>
<form action="friend_requests.php" method="POST">
    <input type="submit" name="acceptrequest<?php echo $user_from; ?>" value="Aceitar"/>
    <input type="submit" name="ignorerequest<?php echo $user_from; ?>" value="Ignorar"/>
</form>
<?php
    }
}
?>