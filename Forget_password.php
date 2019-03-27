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
    <?php include ('DbConnection.php') ?>
    <title>Wachtwoord vergeten | OV Portaal</title>
</head>
<body>
<div class="container">
    <div class="loginbox">
        <h3>Wachtwoord vergeten?</h3>
        <?php include('Passwordcontroller.php') ?>
        <p>Voer uw gegevens in om een nieuw wachtwoord in te kunnen stellen</p>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="Email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email-adres" required name="forgetemail">
                        <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                        </span>
                     </p>
                </div>
            </div>
            <nav class="level">
                <div class="level-item has-text-left">
                    <a href="index.php">Terug naar inloggen?</a>
                </div>
                <div class="level-item has-text-right">
                    <div>
                        <div class="control">
                            <button class="button is-link" type="submit">Herstel</button>
                        </div>
                    </div>
                </div>
            </nav>
        </form>
    </div>
</div>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
