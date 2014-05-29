<?php

include("./inc/connect.inc.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $setopened_query = mysql_query("UPDATE pvt_messages SET opened='yes' WHERE id=$id");
}
?>