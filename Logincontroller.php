<?php

include ('DbConnection.php');
include ('Messagecontroller.php');
include('Functioncontroller.php');
include ('Checkcontroller.php');
include ('Session & Cookie controller.php');

$message = new Messagecontroller();

if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password']))
{
    $email = mysqli_real_escape_string($_ENV['conn'], $_POST['email']);
    $password = mysqli_real_escape_string($_ENV['conn'], $_POST['password']);

    $stmtlogin = $_ENV['conn']->prepare("SELECT EMail FROM account WHERE EMail=?");
    $stmtlogin->bind_param("s", $email);
    $stmtlogin->execute();
    $stmtlogin->store_result();
    $stmtlogin->fetch();

    $stmtactivate = $_ENV['conn']->prepare("SELECT activated FROM account WHERE Email =? AND activated = 1");
    $stmtactivate->bind_param("s", $email);
    $stmtactivate->execute();
    $stmtactivate->store_result();
    $stmtactivate->fetch();

    $stmtfa = $_ENV['conn']->prepare("SELECT FA FROM account WHERE EMail =? AND FA = 1");
    $stmtfa->bind_param("s", $email);
    $stmtfa->execute();
    $stmtfa->store_result();
    $stmtfa->fetch();

    if (password_verify($password, getPasswordhash($email)) && $stmtlogin->num_rows > 0 && $stmtactivate->num_rows > 0)
    {
        if ($stmtfa->num_rows > 0)
        {
            if ($_SESSION['counter'] >= 3)
            {
                if (!checkRECAPTCHAResponse($_POST['g-recaptcha-response'])->success)
                {
                    $message->getMessage("reCAPTCHAfailed");
                }
                else
                {
                    header('Location: http://localhost/OVProjectv1/2FA.php?email=' . $email . '');
                    if(isset($_POST['stayLoggedIn']))
                    {
                        $_SESSION['login'] = 1;
                    }
                }
            }
            else
            {
                header('Location: http://localhost/OVProjectv1/2FA.php?email=' . $email . '');
                if(isset($_POST['stayLoggedIn']))
                {
                    $_SESSION['login'] = 1;
                }
            }
        }
        else if ($stmtlogin->num_rows > 0)
          {
              if ($_SESSION['counter'] >= 3)
              {
                  checkRECAPTCHAResponse();
                  if (checkRECAPTCHAResponse() == "")
                  {
                      getMessage("reCAPTCHAfailed");
                  }
                  else
                  {
                      header('Location: http://localhost/OVProjectv1/Userinterface.php');
                      if(isset($_POST['stayLoggedIn']))
                      {
                          $_SESSION['login'] = 1;
                      }
                  }
              }
              header('Location: http://localhost/OVProject/Userinterface.php');
              if(isset($_POST['stayLoggedIn']))
              {
                  $_SESSION['login'] = 1;
              }
          }
        }
        else if (!password_verify($password, getPasswordhash($email)) || !$stmtlogin->num_rows > 0)
        {
          $message->getMessage("Loginfailed");
          $_SESSION['counter']++;
        }
        else if (!$stmtactivate->num_rows > 0)
        {
          $message->getMessage("AccountNotActivated");
          $_SESSION['counter']++;
        }

        $stmtfa->close();
        $stmtactivate->close();
        $stmtlogin->close();
}

?>
