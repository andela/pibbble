function view(projectID, viewsValueOnThumbnail, viewsValueOnModal)
{
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var viewsCount = xmlhttp.responseText;
            document.getElementById(viewsValueOnThumbnail).innerHTML = viewsCount;
            document.getElementById(viewsValueOnModal).innerHTML = viewsCount;
        }
    };

    xmlhttp.open("GET", "/project/view/"+projectID, true);
    xmlhttp.send();
}