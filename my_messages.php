
<!--<script language="javascript">
    function toggle() {
        var ele = document.getElementById("toggleText");
        if (ele.style.display == "block") {
            ele.style.display = "none";
        }
        else
        {
            ele.style.display = "block";
        }
    }
</script>-->

<?php
include("inc/header.inc.php");

// carrega as mensagens NAO LIDAS do usuario logado.
echo "<h2>Mensagens Não Lidas: </h2><p />";
$grab_messages = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$user' && opened='no'");
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

        /* Usando o codigo na mao para aparecer o body com efeito
        echo "<a href='$user_from'>$user_from</a> - <a href='javascript:toggle()'>$msg_title</a>
        <div id='toggleText' style='display: none;'>
        <br />
        $msg_body
        </div>
        <hr /><br />
        ";
        */

        //usando o jquery para fazer o efeito do body aparecendo deslizando
        echo "<a href='$user_from'>$user_from</a> - <a href='javascript:$(\"#toggleText\").slideToggle(1000)'>$msg_title</a>
        <div id='toggleText' style='display: none;'>
        <br />
        $msg_body
        </div>
        <hr /><br />
        ";

    }
}
else {
    echo "Você não tem nenhuma mensagem para ler.";
}

// carrega as mensagens LIDAS do usuario logado.
echo "<h2>Mensagens Lidas: </h2><p />";
$grab_messages = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$user' && opened='yes'");
$numrows_read = mysql_num_rows($grab_messages);
if ($numrows_read != 0) {
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

        echo "<a href='$user_from'>$user_from</a> - <a href='#'>$msg_title</a><hr /><br />";
    }
}
else {
    echo "Você ainda não leu nenhuma mensagem.";
}
?>