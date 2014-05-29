<?php

    include_once 'includes/dbConnection.php';
    include_once 'includes/functions.php';
     
    sec_session_start();
?>

<?php include 'header.php'; ?>
<?php include 'includes/adminPreload.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
    <body>
        <header id="headerSticky" class="fixed">

          <?php include 'appNav.php'; ?>

        </header>

        <section id="admin">
          <div class="row">
            <div class="small-8 small-offset-2 columns">
                <?php
                  echo($adminClients);
                  echo($adminProjects);
                  echo($adminTasks);
                  echo($adminRoles);
                ?>
            </div>
          </div>
        </section>

<?php else : ?>

  <?php include 'unAuth.php'; ?>

<?php endif; ?>

<?php include 'footer.php'; ?>