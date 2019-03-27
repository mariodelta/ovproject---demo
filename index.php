<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('Session & Cookie controller.php') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="css/bulma-radio-checkbox.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <?php include('DbConnection.php') ?>
    <title>OV Portaal</title>
</head>
<body>
<div class="container">
    <div class="loginbox">
        <h3>Welkom bij het Openbaar Vervoer Portaal</h3>
        <?php include('Logincontroller.php'); ?>
        <p>Login met u inloggegevens</p>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="Email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="E-mail adres" required name="email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="Wachtwoord" class="col-sm-2 col-form-label">Wachtwoord:</label>
                <div class="col-sm-10">
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="password" placeholder="Wachtwoord" required name="password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="field">
                    <p class="control">
                        <div class="b-checkbox is-info">
                            <input name="stayLoggedIn" id="checkbox" class="styled" type="checkbox">
                            <label id="label" for="checkbox">Aangemeld blijven?</label>
                        </div>
                    </p>
                </div>
            </div>
            <?php showRECAPTCHA() ?>
            <nav class="level">
                <div class="level-item has-text-left">
                    <a href="Forget_password">Wachtwoord vergeten?</a>
                </div>
                <div class="level-item has-text-right">
                    <div>
                        <div class="control">
                            <button class="button is-link" type="submit">Inloggen</button>
                        </div>
                    </div>
                </div>
            </nav>
        </form>
    </div>
</div>
</body>
<script src='https://www.google.com/recaptcha/api.js' async defer >
<script  src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
