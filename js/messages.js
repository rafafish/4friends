function show_messages(user,id) {
    var hr = new XMLHttpRequest();
    var url = "show_messages.php";
    var vars = "user_to="+user;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("messages").innerHTML = return_data;
            $("#toggleText_"+id).slideToggle(1000);
        }
    }
    hr.send(vars);
    document.getElementById("unread").innerHTML = "processando...";
}

function set_read(id,user,opened){
    if (opened == "no") {
        var hr = new XMLHttpRequest();
        var url = "setopened.php";
        var vars = "id="+id;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.send(vars);

        show_messages(user,id);
    }
    else
    {
        $("#toggleText_"+id).slideToggle(1000);
    }
}
