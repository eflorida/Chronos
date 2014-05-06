<?php

    include_once 'includes/dbConnection.php';
    include_once 'includes/functions.php';
     
    sec_session_start();
?>

<?php include 'header.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
    <body>
        <header id="headerSticky" class="fixed">

          <?php include 'appNav.php'; ?>

        </header>

        <section id="dashboard">
          <div class="row">
            <div class="small-12 columns">
                <h3>Content goes here.</h3>
            </div>
          </div>
        </section>
            
<?php else : ?>

  <?php include 'unAuth.php'; ?>

<?php endif; ?>

<?php include 'footer.php'; ?>