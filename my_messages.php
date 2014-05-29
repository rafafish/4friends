<?php include("inc/header.inc.php"); ?>
<script type="text/javascript" src="js/messages.js"></script>
<script>show_messages("<? echo $user; ?>")</script>
<h2>Minhas mensagens: </h2><p />
<table class="inbox" width="100%">
    <tr class="border_bottom">
        <th width="20%" valign="top">De</th>
        <th width="60%" valign="top">Assunto</th>
        <th width="10%" valign="top">Data</th>
        <th width="20%" valign="top">Ação</th>
    </tr>
    <tbody id="messages">
    </tbody>
</table>