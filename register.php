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
              <div class="small-12 columns">
                <ul>
                  <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
                  <li>Emails must have a valid email format</li>
                  <li>Passwords must be at least 6 characters long</li>
                  <li>Passwords must contain</li>
                      <ul>
                          <li>At least one upper case letter (A..Z)</li>
                          <li>At least one lower case letter (a..z)</li>
                          <li>At least one number (0..9)</li>
                      </ul>
                  </li>
                  <li>Your password and confirmation must match exactly</li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="small-8 small-offset-2 columns panel">
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
                  <label>Username: <input type='text' name='username' id='username' /></label>
                  <label>Email: <input type="text" name="email" id="email" /></label>
                  <label>Password: <input type="password" name="password" id="password"/></label>
                  <label>Confirm password: <input type="password" name="confirmpwd" id="confirmpwd" /></label>
                  <input type="button" value="Register" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" /> 
                </form>
                <div class="row">
                  <div class="small-12 columns">
                    <p>You are currently logged <?php echo $logged ?>.</p>
                  </div>
                </div>
                <p>Return to the <a href="login.php">login page</a>.</p>
              </div>
            </div>
          </section>
            

<?php include 'footer.php'; ?>