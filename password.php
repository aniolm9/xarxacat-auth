<!DOCTYPE html>

<?php
include_once "includes/functions.php";
$_SESSION["last_page"] = "password";

if (!$_SESSION["loggedin"]) {
    header('Location: login');
}

function password($old_pass, $new_pass, $new_pass_repeat) {
    // check if passwords are provided
    if (empty($old_pass) || empty($new_pass) || empty($new_pass_repeat)) {
	$_SESSION["error"] = "No has omplert tots els camps.";
	header('Location: error');
        exit();
    }

    $user = "uid=".$_SESSION["user"].",ou=humans,dc=xarxacatala,dc=cat";
    $ldap = connect();

    $bind = ldap_bind($ldap, $user, $old_pass);

    if ($bind) {
        if ($new_pass == $new_pass_repeat) {
            $info = array("userPassword" => '{crypt}'.crypt($new_pass, '$6$rounds=5000$posaunafraseabsurda$'));

            if ($modify = ldap_modify($ldap, $user, $info)) {
		$_SESSION["success"] = "La teva contrasenya s'ha canviat correctament.";
		header('Location: success');
            }
        }
        else {
            $_SESSION["error"] = "Les contrasenyes no coincideixen.";
        }

    }
    else {
        $_SESSION["error"] = "La contrasenya actual és incorrecta.";
    }

    ldap_close($ldap);
    if (!empty($_SESSION["error"])){
      header('Location: error');
    }
}

// check if the form has run
if (isset($_POST["new_pass"])) {
    $old_pass = htmlspecialchars($_POST["old_pass"]);
    $new_pass = htmlspecialchars($_POST["new_pass"]);
    $new_pass_repeat = htmlspecialchars($_POST["new_pass_repeat"]);
    password($old_pass, $new_pass, $new_pass_repeat);
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
              <li class="nav-item"><a href="/" title="Inici" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i>Inici</a></li>
              <li class="nav-item"><a><a href="password" title="Contrasenya" class="nav-link active"><i class="fa fa-lock" aria-hidden="true"></i>Contrasenya</a></a></li>
            </ul>
          </div>
          <div class="col-md-8">
            <h1>Control d'usuaris</h1>
            <h2>Contrasenya</h2>
            <div class="row">
              <p>Des d'aquí pots modificar la contrasenya d'accés a tots els serveis de Xarxa Català.</p>
              <hr>
              <div class="container content">
                <form action="password" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label><strong>Contrasenya actual:</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="old_pass" value=""/>
                            </div>
                        </div>
                    </div>

                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label><strong>Nova contrasenya:</strong></label>
                        </div>
                        <div class="col-md-6">
                          <input type="password" name="new_pass" value=""/>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label><strong>Repeteix la contrasenya:</strong></label>
                        </div>
                        <div class="col-md-6">
                          <input type="password" name="new_pass_repeat" value=""/>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Envia" class="nnb_submit">
                  </div>

                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

    <?php include_once "includes/header.php" ?>

    <script src="assets/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
  </body>
</html>
