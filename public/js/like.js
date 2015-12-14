function like(projectID)
{
    var elementID = "link-text";
    var linkText = document.getElementById(elementID).innerHTML;
    alert(linkText);
    document.getElementById("ajaxResponse").innerHTML = "1";

    //var ajaxResponse = ajaxCall(projectID);

    if(linkText == "Like") {
        document.getElementById(elementID).innerHTML = "Unlike";
        document.getElementById(elementID).style.color = "red";
    }
    else if(linkText == "Unlike") {
        document.getElementById(elementID).innerHTML = "Like";
        document.getElementById(elementID).style.color = "#2296cc";
    }
}

function ajaxCall(projectID)
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
        }
    };

    xmlhttp.open("GET", "/project/like/"+projectID, true);
    xmlhttp.send();
}