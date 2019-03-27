<?php

function getStations()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, "http://webservices.ns.nl/ns-api-stations-v2");
    curl_setopt($ch, CURLOPT_USERPWD, "mariodelta1809@gmail.com" . ':' . "F4il13UC0ILq9fsVxgAgVv3QtgBS_-YspIea-vUvT6ruRv2aS94Lnw");
    $result = curl_exec($ch);
    curl_close($ch);

    $xml = simplexml_load_string($result);

    foreach ($xml as $station)
    {

        echo "<option>" . $station->Namen->{'Lang'} . "</option>";

    }
}

function getDisruptions()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, "http://webservices.ns.nl/ns-api-storingen?actual=true");
    curl_setopt($ch, CURLOPT_USERPWD, "mariodelta1809@gmail.com" . ':' . "F4il13UC0ILq9fsVxgAgVv3QtgBS_-YspIea-vUvT6ruRv2aS94Lnw");
    $result = curl_exec($ch);
    curl_close($ch);

    $xml = simplexml_load_string($result);

    echo "<div class='disruptions'>";
    foreach ($xml as $station)
    {
        echo "<div class='items'>";
        echo "<small style='font-weight: bold;'>" . $station->Storing->{'Traject'}. "</small>" . "<br>";
        echo "<small>" . $station->Storing->{'Reden'}. "</small>" . "<br>";
        echo "<small>" . $station->Storing->{'Periode'}. "</small>" . "<br>";
        echo "<small>" .$station->Storing->{'Advies'}. "</small>" . "<br>";
        echo "</div>";
        echo "<br>";
    }
    echo "</div>";
}

?>