<!DOCTYPE html>

<?php
include_once "includes/functions.php";

if(empty($_SESSION["success"]) && empty($_SESSION["last_page"]))
  header('Location: home');

if (empty($_SESSION["success"]))
  $_SESSION["success"] = "Ooops! Something wierd just happened, this is embarrassing :/";

if (empty($_SESSION["last_page"]))
  $_SESSION["last_page"] = "home";

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
          <div class="col-md-12">
            <h1>Account Manager</h1>
            <h2><span class="success">Success</span></h2>
            <div class="row">
              <p><?=$_SESSION["success"]?></p>
              <p><a href="home" title="Get back.">Torna a l'inici.</a></p>
            </div>
          </div>
      </div>
    </div>

    <?php include_once "includes/header.php" ?>

    <script src="assets/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
  </body>
</html>

<?php
unset($_SESSION["last_page"]);
unset($_SESSION["success"]);
 ?>
