<?php

    $station = $_GET['st'];
    $station = preg_replace('/\s+/', '+', $station);


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, "http://webservices.ns.nl/ns-api-avt?station=$station");
    curl_setopt($ch, CURLOPT_USERPWD, "mariodelta1809@gmail.com" . ':' . "F4il13UC0ILq9fsVxgAgVv3QtgBS_-YspIea-vUvT6ruRv2aS94Lnw");
    $result = curl_exec($ch);
    curl_close($ch);

    $xml = simplexml_load_string($result);

    echo "<div class='depature'>";
    foreach ($xml as $station)
    {
        echo "<div class='items'>";
        echo "<h6>" .  date('H:i', strtotime($station->{'VertrekTijd'}) + 60*60) . "&nbsp;" . "<span style='color: red; font-weight: bold;'>" . $station->{'VertrekVertragingTekst'} . "</span>" . "</h6>";
        echo "<h6>" . $station->{'TreinSoort'} . "&nbsp;" .  $station->{'EindBestemming'}. "</h6>";
        echo "<small>" . "Via:" . "&nbsp;" .  $station->{'RouteTekst'}. "</small>" . "<br>";
        echo "<small style='float: left;'>" . $station->{'RitNummer'}. "</small>" . "<br>";
        echo "<small style='float: right;'>" . "Spoor " . $station->{'VertrekSpoor'}. "</small>" . "<br>";
        echo "<small style='float: right; color: red; font-weight: bold;'>" . $station->Opmerkingen->{'Opmerking'}. "</small>" . "<br>";
        echo "</div>";
        echo "<br>";

    }
    echo "</div>";