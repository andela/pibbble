function like(projectID, likes)
{
    var linkText = document.getElementById("like-link").innerHTML;

    //var ajaxResponse = ajaxCall(projectID, linkText);

    if(linkText == "Like") {
        document.getElementById("like-text").innerHTML = "You and "+likes+" other people like this project.";
        document.getElementById("like-link").innerHTML = "Unlike";
        document.getElementById("like-link").style.color = "red";
    }
    else if(linkText == "Unlike") {
        document.getElementById("like-text").innerHTML = "You have unliked this project.";
        document.getElementById("like-link").innerHTML = "Like";
        document.getElementById("like-link").style.color = "#2296cc";
    }
}

function ajaxCall(projectID, action)
{
    if (window.XMLHttpRequest) {
        // For IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {
        // For IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxResponse").innerHTML = xmlhttp.responseText;
            return xmlhttp.responseText;
        }
    };

    xmlhttp.open("GET", "project_liker.php?id="+projectID+"&action="+action, true);
    xmlhttp.send();
}