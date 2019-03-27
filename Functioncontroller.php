<?php

session_start();

include('DbConnection.php');

require_once('vendor/GA/PHPGangsta/GoogleAuthenticator.php');

function getHash($email)
{
    $hash = "";

    $stmthash = $_ENV['conn']->prepare("SELECT hash FROM account WHERE EMail=?");
    $stmthash->bind_param("s", $email);
    $stmthash->execute();
    $stmthash->bind_result($hash);
    $stmthash->store_result();

    if ($stmthash->num_rows == 1)
    {
        while($stmthash->fetch()) {
           return $hash;
        }
    }
}

function getSecret($email)
{
    $secretsql = "SELECT secret FROM account WHERE EMail= '$email'";
    $secretresult = $_ENV['conn']->query($secretsql);

    if ($secretresult->num_rows == 1)
    {
        while($secret = $secretresult->fetch_assoc())
        {
            return $secret['secret'];
        }
    }
}

function createSecret($email)
{
    $authenticator = new PHPGangsta_GoogleAuthenticator();
    $secretcode = $authenticator->createSecret();

    $secretsql = "UPDATE account SET secret = '$secretcode' WHERE EMail = '$email'";
    $_ENV['conn']->query($secretsql);
}


function createHash($email)
{
    $hash  = md5(rand(1, 1000));

    $createhashsql = "UPDATE account SET hash= '$hash' WHERE EMail = '$email'";
    $_ENV['conn']->query($createhashsql);

}

function checkHash($email, $hash)
{
    $message = new Messagecontroller();

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
            $message->getMessage("Hashinvaild");
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

function getPasswordhash($email)
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

function secretChecker($email, $code)
{
    $authenticator = new PHPGangsta_GoogleAuthenticator();
    $message = new Messagecontroller();

    if(!empty(getSecret($email)))
    {
        $secret = getSecret($email);
        $result = $authenticator->verifyCode($secret, $code, 0);
        if ($result)
        {
            header('Location: http://localhost/OVProjectv1/Userinterface.php');
            $_SESSION['counter'] = 0;
        }
        else
        {
            $message->getMessage("2facodeinvaild");
        }
    }
    else if(empty(getSecret($email)))
    {
        createSecret($email);
    }
}


function showRECAPTCHA()
{
    if (!isset($_SESSION['counter']))
    {
        $_SESSION['counter'] = 0;
    }
    else if ($_SESSION['counter'] >= 3)
    {
        echo  "<div class='g-recaptcha g-recaptcha-response' data-sitekey='6Ld4doYUAAAAANA22Nr5Gzn9yQGuSwdoRcW9eV1g'></div>";
    }
}

function checkRECAPTCHAResponse($gresponse)
{
    if ($_SESSION['counter'] >= 3)
    {
        $secret = "6Ld4doYUAAAAAIW9e810JbKnT88YoP7K8wISPN6R";
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $gresponse . '');
        $responseData = json_decode($verifyResponse);
        return $responseData;
    }
}


?>

