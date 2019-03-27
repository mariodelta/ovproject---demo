<?php

include('DbConnection.php');

function getHash($email)
{
    $hashsql = "SELECT hash FROM account WHERE EMail= '$email'";
    $hashresult = $_ENV['conn']->query($hashsql);

    if ($hashresult->num_rows == 1)
    {
        while($hash = $hashresult->fetch_assoc()) {
            return $hash['hash'];
        }
    }
}

function createHash($email)
{
    $hash  = md5(rand(1, 1000));

    $createhashsql = "UPDATE account SET hash= '$hash' WHERE EMail = '$email'";
    $createhashresult = $_ENV['conn']->query($createhashsql);

}

function checkHash($email, $hash)
{
    $checkhashsql = "SELECT Hash FROM account WHERE EMail= '$email'";
    $checkhashresult = $_ENV['conn']->query($checkhashsql);

    if ($checkhashresult->num_rows >= 0)
    {
        while($row = $checkhashresult->fetch_assoc())
        {
            $hashstring = $row['Hash'];
        }
        if ($hash !== $hashstring)
        {
            getMessage("Hashinvaild");
            die();
        }
    }
}

function getName($email)
{
    $namesql = "SELECT Voornaam FROM account WHERE EMail= '$email'";
    $nameresult = $_ENV['conn']->query($namesql);

    if ($nameresult->num_rows == 1)
    {
        while($name = $nameresult->fetch_assoc()) {
            return $name['Voornaam'];
        }
    }
}

function getPassword($email)
{
    $passwordsql = "SELECT Wachtwoord FROM account WHERE EMail= '$email'";
    $passwordresult = $_ENV['conn']->query($passwordsql);

    if ($passwordresult->num_rows == 1)
    {
        while($password = $passwordresult->fetch_assoc()) {
            return $password['Wachtwoord'];
        }
    }
}

function check2fa($enteredcode)
{
    if (isset($_POST['facode']) && !empty($_POST['facode']))
    {
        require_once 'vendor/GoogleAuthenticator-master/PHPGangsta/GoogleAuthenticator.php';

        $ga = new PHPGangsta_GoogleAuthenticator();
        $secret = $ga->createSecret();
        echo "Secret is: ".$secret."\n\n";

        $oneCode = $ga->getCode($secret);
        echo "Checking Code '$oneCode' and Secret '$secret':\n";

        $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
        if ($checkResult) {
            echo 'OK';
        } else {
            echo 'FAILED';
        }
    }
}

?>

