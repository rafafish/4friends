<?php
include("./inc/connect.inc.php");

if (isset($_POST['user_from']) && !empty($_POST['user_from'])) {
    $user_from = $_POST['user_from'];

    if (isset($_POST['user_to']) && !empty($_POST['user_to'])) {
        $user_to = $_POST['user_to'];

        if (isset($_POST['post']) && !empty($_POST['post'])) {
            $post = $_POST['post'];

            $date_added = date("Y-m-d");
            $added_by = $user_from;
            $user_posted_to = $user_to;
            $sqlCommand = "INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')";
            $query = mysql_query($sqlCommand) or die(mysql_error());

            echo "Post publicado com sucesso!";
        }
        else
        {
            echo "Por favor, digite alguma coisa para postar";
        }
    }
}





 ?>