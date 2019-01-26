<!DOCTYPE html>

<?php
include_once "includes/functions.php";

if (!$_SESSION["loggedin"]) {
    header('Location: login');
}

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Control d'usuaris | Xarxa Català</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="assets/big-picture/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="assets/big-picture/css/main.css" type="text/css" rel="stylesheet" />
    <link href="assets/big-picture/css/nnb_custom.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/custom.css" type="text/css" rel="stylesheet" />

  </head>
  <body>
    <?php include "includes/header.php" ?>

    <div class="container">
      <div class="row">
          <div class="col-md-4" >
            <ul class="nav nav-pills nav-stacked nav-bracket">
              <li class="nav-item"><a href="/" title="Inici" class="nav-link active"><i class="fa fa-home" aria-hidden="true"></i>Inici</a></li>
              <li class="nav-item"><a><a href="password" title="Contrasenya" class="nav-link"><i class="fa fa-lock" aria-hidden="true"></i>Contrasenya</a></a></li>
            </ul>
          </div>
          <div class="col-md-8">
            <h1>Control d'usuaris</h1>
            <h2>Inici</h2>
            <div class="row">
              <p>Des d'aquí pots modificar la contrasenya d'accés a tots els serveis de Xarxa Català.</p>
              <hr>
              <div class="container content">
                <div class="row">
                  <div class="col-md-3">
                    <p><strong>Usuari:</strong></p>
                  </div>
                  <div class="col-md-9">
                    <p><?=$_SESSION["user"]?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
</div>

    <?php include_once "includes/header.php" ?>

    <script src="assets/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
  </body>
</html>
