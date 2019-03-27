<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('Session & Cookie controller.php') ?>
    <?php include('Functioncontroller.php') ?>
    <?php include('Messagecontroller.php') ?>
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
        <h3>2 Staps-verificatie</h3>
        <?php
            if((isset($_POST['facode']) && !empty($_POST['facode'])))
            secretChecker($_GET['email'], $_POST['facode'])
        ?>
        <p>Voer de code in die u te zien krijgt in uw Authenticator app</p>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Code:</label>
                <div class="col-sm-10">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Code" required name="facode">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
            </div>
            <input class="button is-link" type="submit" value="Controleer">
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