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
    <?php
      if (isset($_GET['error'])) {
          echo '<p class="error">Error Logging In!</p>';
      }
    ?> 

    <header id="headerSticky" class="fixed">

      <?php include 'mainNav.php'; ?>

    </header>
    
    <section>
      <div class="row">
        <div class="small-8 small-offset-2 columns panel">
        	<div>
  	        <h3>Login Below</h3>
  	        <p>If you don't have an account, check out our <a href="index.html/#pricing" >pricing options</a>.</p>
        	</div>
        </div>
      </div>
    </section>

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
              <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
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
    
    <?php include 'footer.php'; ?> 
