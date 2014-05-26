// Javascript para enviar o post sem dar reload na pagina
function send_post() {
    var hr = new XMLHttpRequest();
    var url = "send_post.php";
    var post = document.getElementById("post").value;
    var user_from = document.getElementById("user_from").value;
    var user_to = document.getElementById("user_to").value;
    var vars = "post="+post+"&user_from="+user_from+"&user_to="+user_to;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("feedback").innerHTML = return_data;
            document.getElementById("post").value = '';
        }
    }
    hr.send(vars);
    document.getElementById("feedback").innerHTML = "processando...";
}