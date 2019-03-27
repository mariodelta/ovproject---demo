<?php

include ('DbConnection.php');
include ('Messagecontroller.php');
include ('Mailcontroller.php');

$message = new Messagecontroller();

if(isset($_POST['forgetemail']) & !empty($_POST['forgetemail']))
{
    $email = mysqli_real_escape_string($_ENV['conn'], $_POST['forgetemail']);

    $stmtemail = $_ENV['conn']->prepare("SELECT EMail FROM account WHERE EMail=?");
    $stmtemail->bind_param("s", $email);
    $stmtemail->execute();
    $stmtemail->store_result();
    $stmtemail->fetch();

    if ($stmtemail->num_rows == 0)
    {
        $message->getMessage("EmailNotFound");
    }
    else
    {
        createHash($email);
        resetPasswordmail($email, getHash($email), getName($email));
        $message->getMessage("PasswordLinkSentSuccesful");
    }
}

function setPassword($currentpwd, $newpwd, $repeatpwd, $email)
{
    $message = new Messagecontroller();

    if(isset($_POST['currentpassword']) & !empty($_POST['currentpassword']) AND isset($_POST['newpassword']) & !empty($_POST['newpassword']) AND isset($_POST['repeatpassword']) & !empty($_POST['repeatpassword']))
    {
        if (password_verify($currentpwd, getPasswordhash($email)) && $newpwd == $repeatpwd)
        {
            $hashpassword =  password_hash($newpwd, PASSWORD_BCRYPT);

            $stmtsetpassword = $_ENV['conn']->prepare("UPDATE account SET Wachtwoord = '$hashpassword' WHERE EMail =?");
            $stmtsetpassword->bind_param("s", $email);
            $status = $stmtsetpassword->execute();

            $stmtdeletehash = $_ENV['conn']->prepare("UPDATE Account SET Hash = '' WHERE EMail =?");
            $stmtdeletehash->bind_param("s", $email);
            $stmtdeletehash->execute();

            if ($status === true) {
                $message->getMessage("Passwordresetsuccess");
                header('Refresh: 5; URL=http://localhost/OVProjectv1/index.php');
                $stmtdeletehash->execute();
                die();
            }
        }
        else if ($newpwd !== $repeatpwd)
        {
            $message->getMessage("Passwordnotequal");
        }
        else if (password_verify($_POST['currentpassword'], getPasswordhash($email)))
        {
            $message->getMessage("Currentpasswordnotequal");
        }

    }
}



?>