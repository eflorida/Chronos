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
                <h3>Submit Timesheet</h3>
            </div>
          </div>

          <div class="row">
            <div class="small-12 columns">
                <h2>Week of 05/19 - 05/26</h2>
            </div>
            <div class="small-2 columns">
              <p>14:30:00</p>
            </div>
            <div class="small-10 columns">
              <div class="row">
                <div class="small-12 columns">
                  <div class="progress">
                    <span class="meter"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="small-12 columns">
                <h2>Today (05/19/15)</h2>
            </div>
          </div>

          <div class="row">
            <div class="small-12 columns">
                <h3>Wolters Kluwer</h3>
            </div>
            <div class="small-12 columns">
                <h5>Advertising Center (consultant) - UIX</h5>
            </div>
            <div class="small-1 columns">
              <p><i class="fa fa-times"></i><i class="fa fa-pencil"></i></p>
            </div>
            <div class="small-2 columns">
              <p>02:30</p>
            </div>
            <div class="small-9 columns">
              <div class="row">
                <div class="small-12 columns">
                  <canvas   id      ="canvas-p7"
                            width   ="500"
                            height  ="42"
                            style   ="border:1px solid #dedede;">
                  </canvas>
                </div>
              </div>
              <div class="row">
                <div class="small-12 columns">
                  <div class="progressbar" data-minutes"30"></div>
                </div>
              </div>
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