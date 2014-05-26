<?php
include ("inc/header.inc.php");

    if (isset($_GET['u'])) {
        $username = mysql_real_escape_string($_GET['u']);
        if (ctype_alnum($username)){
            //verifica se o usuario passado como parametro existe
            $check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
            if (mysql_num_rows($check)==1) {
                $get = mysql_fetch_assoc($check);
                $username = $get['username'];
                $firstname = $get['first_name'];

                //verifica se a mensagem esta sendo enviada para o proprio usuario.
                if ($username != $user) {
                    if (isset($_POST['submit'])) {
                        $msg_title = strip_tags(utf8_decode(@$_POST['msg_title']));
                        $msg_body = strip_tags(utf8_decode(@$_POST['msg_body']));
                        $date = date("Y-m-d");
                        $opened = "no";

                        if ($msg_body == "") {
                            echo "Digite alguma coisa...";
                        }
                        else if (strlen($msg_body) < 3) {
                            echo "Sua mensagem está muito curta. Ela precisa ter no mínimo 3 caracteres";
                        }
                        else if ($msg_title == "") {
                            echo "Digite o título da mensagem";
                        }
                        else if (strlen($msg_title) < 3) {
                            echo "Título da mensagem muito curto";
                        }
                        else {
                        $send_msg_query = mysql_query("INSERT INTO pvt_messages VALUES ('','$user','$username','$msg_body','$date', '$opened', '$msg_title')");
                        echo "Mensagem enviada com sucesso!";
                        }
                    }
                    echo "<form action='send_msg.php?u=$username' method='POST'>
                          <h2>Escreva uma mensagem: ($username)</h2>
                          <input type='text' name='msg_title' size='30' placeholder='Digite o título da mensagem'><p />
                          <textarea cols='50' rows='12' name='msg_body' placeholder='Deixe uma mensagem'></textarea><p />
                          <input type='submit' name='submit' value='Enviar Mensagem'>
                          </form>";

                }
                else {
                    header("Location: $user");
                }
            }
            else {
                echo "O usuário $username não existe!";
            }
        }
    }
?>
