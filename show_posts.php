<?php
include('inc/connect.inc.php');

    if (isset($_POST['user_to']) && !empty($_POST['user_to'])) {
        $user_to = $_POST['user_to'];
        //Mostra os posts
        $getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$user_to' ORDER BY id DESC LIMIT 10") or die(mysql_error());
        while($row = mysql_fetch_assoc($getposts)) {
            $id = $row['id'];
            $body = $row['body'];
            $date_added = $row['date_added'];
            $added_by = $row['added_by'];
            $user_posted_to = $row['user_posted_to'];
            echo " <div class='profilePost'><div class='posted_by'><a href='$added_by'>$added_by</a> - $date_added - </div>&nbsp;&nbsp;$body<br /></div>";
      }
}

?>