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
                <h3>Standard Timeclock view.</h3>
            </div>
          </div>

          <div class="row">
            <div class="small-12 columns">
                <h2>Week To Date</h2>
            </div>
            <div class="small-2 columns">
              <p>14:30:00</p>
            </div>
            <div class="small-10 columns">
              <div class="row">
                <div class="small-12 columns">
                  <div class="progress">
                    <span class="meter" style="width: 37%"></span>
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
                  <div class="progress">
                    <span class="meter" style="width: 22%"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row timestampGraph" data-equalizer>
            <div class="small-12 columns">
                <h3>PentaVision</h3>
            </div>
            <div class="small-12 columns">
                <h5>Website (consultant) - UIX</h5>
            </div>
            <div class="small-1 columns">
              <p><i class="fa fa-times"></i><i class="fa fa-pencil"></i></p>
            </div>
            <div class="small-2 columns">
              <p>06:15</p>
            </div>
            <div class="small-9 columns">
              <div class="row">
                <div class="small-12 columns">
                  <div id="progressbar" value="6"></div>
                </div>
              </div>
              <div class="row">
                <div class="small-12 columns">
                  <div class="progress">
                    <span class="meter" style="width: 66%"></span>
                  </div>
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