<?php

    include_once 'includes/dbConnection.php';
    include_once 'includes/functions.php';
     
    sec_session_start();
?>

<?php include 'header.php'; ?>
<?php include 'includes/adminPreload.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
    <body>
        <header>

          <?php include 'appNav.php'; ?>

        <section id="main-section" class="panel row">

          <div class="small-12 columns">
            <label>Client:
              <select id="projectClientSelect">
                <option value="- Select Project -">- Select Value -</option>
                <?php
                  foreach ($clients as $thisClient) {
                    echo'<option value="'. $thisClient['clientName'] .'" data-id="'. $thisClient['clientID'] .'">'. $thisClient['clientName'] .'</option>';
                  }
                ?>
              </select>
            </label>
            <input type="text" name="clientID" id="clientID" class="hidden" value="" />
          </div>

          <div class="small-12 columns">
            <label>Project:
              <select id="taskProjectSelect">
                <option value="- Select Project -">- Select Value -</option>
                <?php
                  foreach ($projects as $thisProject) {
                    echo'<option value="'. $thisProject["projectName"] .'" data-id="'. $thisProject["projectID"] .'">'. $thisProject["projectName"] .'</option>';
                  }
                ?>
              </select>
            </label>
            <input type="text" name="projectID" id="projectID" class="hidden" value="" />
          </div>

          <div class="small-12 columns">
            <label>Task:
              <select id="projectClientSelect">
                <option value="- Select Project -">- Select Value -</option>
                <?php
                  foreach ($tasks as $thisTask) {
                    echo'<option value="'. $thisTask['taskName'] .'" data-id="'. $thisTask['taskID'] .'">'. $thisTask['taskName'] .'</option>';
                  }
                ?>
              </select>
            </label>
            <input type="text" name="clientID" id="clientID" class="hidden" value="" />
          </div>

          <div class="small-12 columns">
            <label>Role:
              <select id="projectClientSelect">
                <option value="- Select Project -">- Select Value -</option>
                <?php
                  foreach ($roles as $thisRole) {
                    echo'<option value="'. $thisRole['roleName'] .'" data-id="'. $thisRole['roleID'] .'">'. $thisRole['roleName'] .'</option>';
                  }
                ?>
              </select>
            </label>
            <input type="text" name="clientID" id="clientID" class="hidden" value="" />
          </div>

        </section>

        <div class="row">
          <div class="small-8 small-offset-2 columns">
              <a class="button expand" data-reveal-id="startTModal" data-reveal>Start Time</a>
          </div>
          <div class="small-8 small-offset-2 end columns">
              <a class="button expand alert" data-reveal-id="stopTModal" data-reveal>End Time</a>
          </div>
        </div>

        <!-- Modal Area -->

        <div class="row" id="clientAddSubmit">
          <div class="small-8 small-offset-2 columns">
            <input class="button expand success" value="Add Time Entry" id="btnAddTEntry"/>
          </div>
        </div>

        <div id="startTModal" class="reveal-modal" data-reveal>
            <canvas id="startTCanvas" width="300" height="300" style="border:1px solid #e74c3c;"></canvas>
            <a class="close-reveal-modal">&#215;</a>
        </div>

        <div id="stopTModal" class="reveal-modal" data-reveal>
            <canvas id="stopTCanvas" width="360" height="360" style="border:1px solid #e74c3c;"></canvas>
            <a class="close-reveal-modal">&#215;</a>
        </div>

<?php else : ?>
  <!-- The user is NOT logged in, so redirect to login page -->
  <script>
    window.location.href="http://localhost:8080/chronos/index.php";
  </script>
<?php endif; ?>

<?php include 'footer.php'; ?>