<?php

class Messagecontroller
{
    public function getMessage($message)
    {
        if ($message == "Loginfailed")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           Uw Email of wachtwoord is onjuist.
          </div>";
        }
        if ($message == "AccountNotActivated")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           Uw account is nog niet geactiveerd.
          </div>";
        }
        if ($message == "AccountActivated")
        {
            echo  "<br>";
            echo  "<div class='notification is-success'>
           Uw heeft u account met succes geactiveerd.
          </div>";
        }
        if ($message == "EmailNotFound")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           Een account met het opgegeven E-mail adres is niet gevonden.
          </div>";
        }
        if ($message == "PasswordLinkSentSuccesful")
        {
            echo  "<br>";
            echo  "<div class='notification is-success'>
           Er is een herstellink gestuurd naar het opgegeven E-mail adres.
          </div>";
        }
        if ($message == "Hashinvaild")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           Deze link is niet geldig.
          </div>";
        }
        if ($message == "Passwordresetsuccess")
        {
            echo  "<br>";
            echo  "<div class='notification is-success'>
           U heeft met succes u wachtwoord gewijzigd.
           U wordt binnen 5 seconden doorgestuurd naar de inlogpagina.
          </div>";
        }
        if ($message == "Passwordnotequal")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           De wachtwoorden komen niet overeen.
          </div>";
        }
        if ($message == "Currentpasswordnotequal")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           Het huidige wachtwoord komt niet overeen.
          </div>";
        }
        if ($message == "Samepasswordasbefore")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           Het gekozen wachtwoord is hetzelfde als u huidige wachtwoord.
          </div>";
        }
        if ($message == "reCAPTCHAfailed")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
           U heeft de reCAPTCHA niet uitgevoerd of deze is onjuist.
          </div>";
        }
        if ($message == "2facodeinvaild")
        {
            echo  "<br>";
            echo  "<div class='notification is-danger'>
          De ingevoerde code is onjuist.
          </div>";
        }
    }
}



?>