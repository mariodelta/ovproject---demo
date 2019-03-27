<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include('DbConnection.php')?>
    <?php include('APIController.php')?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css" type="text/css">
    <link rel="stylesheet" href="css/bulma-radio-checkbox.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/userinterface.css" type="text/css">
    <link rel="stylesheet" href="css/vertrektijden.css" type="text/css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>
    <title>OV Portaal</title>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="userinterface.php">
            <img src="img/NS.png" width="55">
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Reizigersinformatie
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        Reisplanner
                    </a>
                    <a href="Storingen.php" class="navbar-item">
                        Storingen
                    </a>
                    <a href="Werkzaamheden.php" class="navbar-item">
                        Werkzaamheden
                    </a>
                    <a href="Vertrektijden.php" class="navbar-item">
                        Vertrektijden
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Spoorkaart
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Beheer
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        Storingen
                    </a>
                    <a class="navbar-item">
                        Werkzaamheden
                    </a>
                    <a class="navbar-item">
                        Materieel
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Accounts
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    OV-Chipkaart
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        Beheer
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Geld terug bij vertraging
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Tickets
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        Beheer
                    </a>
                    <a class="navbar-item">
                        Ticket's uitgeven
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Prijzen
                    </a>
                </div>
            </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
                Account
            </a>
            <div class="navbar-dropdown">
                <a class="navbar-item">
                      <span style="font-size: 14px;">
                          <i class="fas fa-cog">&nbsp;</i></span>Instellingen
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                      <span style="font-size: 14px;">
                      <i class="fas fa-sign-out-alt">&nbsp;</i></span>Uitloggen
                </a>
            </div>
        </div>
    </div>
    </div>
</nav>
<div class="content">
    <h3>Vertrektijden</h3>
    <p>Op deze webpagina kunt u de huidige vertrektijden opvragen van alle stations van Nederland</p>
    <p>Kies een station uit de lijst en druk op de knop Laat vertrektijden zien, vervolgens zal het systeem de actuele vertrektijden ophalen</p>
    <div class="dropdown">
        <div class="dropdown-trigger">
            <label>Station:</label>
            <div class="select is-info">
                <form method="GET">
                    <select id="station" onchange="reloadDepatures()" name="station">
                        <?php getStations(); ?>
                    </select>
            </div>
        </div>
    </div>
    <div id="depatures">

    </div>
    </form>
</div>
</body>
<script type="text/javascript" src="js/functions.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
