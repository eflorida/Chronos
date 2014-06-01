<?php

    include_once 'includes/dbConnection.php';
    include_once 'includes/functions.php';
     
    sec_session_start();
     
    if (login_check($mysqli) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }

    include 'header.php';
?>
    <body>
        <header>

          <?php include 'appNav.php'; ?>

          <section id="main-section">
            <div class="row">
              <div class="small-12 columns">
                <?php
                  if (isset($_GET['error'])) {
                    echo '<p class="error">Error Logging In!</p>';
                  }
                ?> 
                  <h3>Welcome to Time Kor</h3>
              </div>
              <div class="small-12 columns">
                  <p>You can use this app to record time sheet data and submit for approval.</p>
                  <p>Making the time sheet process easier and more intuitive means employees dread it less, they record time more accurately, and submit time sheets on time!</p>
                  <p>This app integrates directly with Quicktime, saving time when approving and for accounting entry.</p>
              </div>
            </div>
            <div class="row">
              <div class="small-8 small-offset-2 columns panel">
                <form action="includes/processLogin.php" method="post" name="login_form">
                  <div class="row">
                    <div class="small-12 columns">
                      <label>Email : <input type="email" placeholder="email@address.com" name="email" /> </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="small-4 columns">
                      <label>Password : <input type="password" id="password" name="password" /> </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="small-12 columns">
                      <input type="button" class="button success" value="Login" onclick="formhash(this.form, this.form.password);" />
                    </div>
                  </div>
                </form>
                <div class="row">
                    <div class="small-12 columns">
                      <p>If you don't have a login, please <a href="register.php">register</a></p>
                      <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
                      <p>You are currently logged <?php echo $logged ?>.</p>
                    </div>
                  </div>
              </div>
            </div>
          </section>
            

<?php include 'footer.php'; ?>