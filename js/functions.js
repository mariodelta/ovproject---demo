function reloadDepatures()
{
    var stationname = $("#station option:selected").text();

    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "DepaturesController.php?st=" + stationname, false);
    xmlhttp.send(null);
    document.getElementById("depatures").innerHTML=xmlhttp.responseText;

}
setInterval(function () {
    reloadDepatures();
},5000)

