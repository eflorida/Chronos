<?php

    include_once 'includes/dbConnection.php';
    include_once 'includes/functions.php';
     
    sec_session_start();
?>

<?php include 'header.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
    <body>
        <header>

          <?php include 'appNav.php'; ?>

        <section id="main-section">
          <div class="row">
            <div class="small-12 columns">
                <h3>Stopwatch View</h3>
            </div>
            <div class="small-12 columns">
                <canvas   id      ="canvas-p7"
                            width   ="500"
                            height  ="320"
                            style   ="border:1px solid #dedede;">
                  </canvas>
            </div>
          </div>
        </section>
            
<?php else : ?>
<!-- The user is NOT logged in, so redirect to login page -->
  <script>
    window.location.href="http://localhost:8080/chronos/index.php";
  </script>
<?php endif; ?>

<?php include 'footer.php'; ?>