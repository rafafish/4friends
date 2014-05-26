$(document).ready(
    function() {
        var interval = setInterval(
            function() {
                var hr = new XMLHttpRequest();
                var url = "show_posts.php";
                var user_to = document.getElementById("user_to").value;
                var vars = "user_to="+user_to;
                hr.open("POST", url, true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                hr.onreadystatechange = function() {
                    if(hr.readyState == 4 && hr.status == 200) {
                        var return_data = hr.responseText;
                        document.getElementById("posts").innerHTML = return_data;
                    }
                }
                hr.send(vars);
            },1000);
    });