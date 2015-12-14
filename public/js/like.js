function like(projectID, liked)
{
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxResponse").innerHTML = xmlhttp.responseText;

            if(liked) {
                document.getElementById("like-link").style.color = "#2296cc";
            }
            else {
                document.getElementById("like-link").style.color = "red";
            }
        }
    };

    xmlhttp.open("GET", "/project/like/"+projectID, true);
    xmlhttp.send();
}