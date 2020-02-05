<header id="header">
  <h1 id="logo"><a href="/" title="Control d'usuaris Xarxa Català">Xarxa Català</a></h1>
  <nav id="nav">
      <ul>
          <?php
          if (isset($_SESSION["loggedin"])) {
            ?>
            <li><a href="logout" title="Log Out" class="btn-logout"><i class="fa fa-sign-out " aria-hidden="true"></i></a></li>
            <?php
          }
          ?>
      </ul>
  </nav>
</header>
