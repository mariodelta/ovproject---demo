<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('Session & Cookie controller.php') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?php include('DbConnection.php') ?>
    <title>Wachtwoord Herstellen | OV Portaal</title>
</head>
<body>
<div class="container">
    <div class="loginbox">
        <h3>Wachtwoord Herstellen</h3>
        <?php include('Passwordcontroller.php') ?>
        <?php checkHash($_GET['email'], $_GET['hash']) ?>
        <?php

        $message = new Messagecontroller();

        if (isset($_POST['currentpassword']) && !empty($_POST['currentpassword']) AND isset($_POST['newpassword']) && !empty($_POST['newpassword']) AND isset($_POST['repeatpassword']) && !empty($_POST['repeatpassword']))
        {
            if (password_verify($_POST['currentpassword'], getPasswordhash($_GET['email'])))
            {
                setPassword($_POST['currentpassword'], $_POST['newpassword'], $_POST['repeatpassword'], $_GET['email']);
            }
            else
            {
                $message->getMessage("Currentpasswordnotequal");
            }
        }
        ?>
        <p>Voer de onderstaande velden in om een nieuw wachtwoord in te stellen</p>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="wachtwoord" class="col-sm-2 col-form-label">Huidige:</label>
                <div class="col-sm-10">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Huidige Wachtwoord" required name="currentpassword">
                        <span class="icon is-small is-left">
                                  <i class="fas fa-lock"></i>
                            </span>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="wachtwoord" class="col-sm-2 col-form-label">Nieuw:</label>
                <div class="col-sm-10">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Nieuwe Wachtwoord" required name="newpassword">
                        <span class="icon is-small is-left">
                                  <i class="fas fa-lock"></i>
                            </span>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="wachtwoord" class="col-sm-2 col-form-label">Herhaal:</label>
                <div class="col-sm-10">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Herhaal Wachtwoord" required name="repeatpassword">
                        <span class="icon is-small is-left">
                                  <i class="fas fa-lock"></i>
                            </span>
                    </p>
                </div>
            </div>
            <input class="button is-link" type="submit" value="Herstel">
        </form>
    </div>
</div>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
s