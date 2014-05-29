<?php
include('inc/connect.inc.php');

if (isset($_POST['user_to']) && !empty($_POST['user_to'])) {

    $user_to = $_POST['user_to'];

// carrega as mensagens NAO LIDAS do usuario logado.
    $grab_messages = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$user_to' ORDER BY id DESC LIMIT 10");
    $numrows_unread = mysql_num_rows($grab_messages);
    if ($numrows_unread != 0) {
        while ($get_msg = mysql_fetch_assoc($grab_messages)) {
            $id = $get_msg['id'];
            $user_from = $get_msg['user_from'];
            $user_to = $get_msg['user_to'];
            $msg_title = utf8_encode($get_msg['msg_title']);
            $msg_body = utf8_encode($get_msg['msg_body']);
            $date = $get_msg['date'];
            $opened = $get_msg['opened'];

            if (strlen($msg_body) > 150) {
                $msg_body = substr($msg_body,0,150)."...";
            }
            else {
                $msg_body = $msg_body;
            }

            if (strlen($msg_title) > 50) {
                $msg_title = substr($msg_title,0,50)."...";
            }
            else {
                $msg_title = $msg_title;
            }

            //usando o jquery para fazer o efeito do body aparecendo deslizando
            if ($opened == "yes"){
                echo "
            <tr><td><a href='$user_from'>$user_from</a></td><td><a href='javascript:set_read($id,\"$user_to\",\"$opened\")'>$msg_title</a>
            <div id='toggleText_$id' style='display: none; background-color: #FFFFFF;'>
            <div class='bubble'>
            $msg_body
            </div>
            </div>
            </td>
            <td></td><td><input type='button' name='delete_message' value='X'/></td>
            </tr>
            ";
            }
            else {
                echo "
            <tr><td><strong><a href='$user_from'>$user_from</a></td><td><a href='javascript:set_read($id,\"$user_to\",\"$opened\")'>$msg_title</a></strong>
            <div id='toggleText_$id' style='display: none;background-color: #FFFFFF;'>
            <div class='bubble'>
            $msg_body
            </div>
            </div>
            </td>
            <td></td><td></td>
            </tr>
            ";
            }

        }
    }
    else {
        echo "Você não tem nenhuma mensagem para ler.";
    }
}
?>