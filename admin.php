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
            <div class="large-8 large-offset-2 columns">
                <a class="button expand" data-reveal-id="clientModal" data-reveal>Create Client</a>
            </div>
            <div class="large-8 large-offset-2 columns">
                <a class="button expand" data-reveal-id="projectModal" data-reveal>Create Project</a>
            </div>
            <div class="large-8 large-offset-2 columns">
                <a href="create-task.php" class="button expand" >Create Task</a>
            </div>
            <div class="large-8 large-offset-2 columns">
                <a href="create-role.php" class="button expand" >Create Role</a>
            </div>
            <div class="large-8 large-offset-2 columns">
                <a href="edit-profile.php" class="button expand success" >Edit Profile</a>
            </div>
            <div class="large-8 large-offset-2 columns">
                <a href="includes/logout.php" class="button expand alert" >Log Out</a>
            </div>
          </div>
        </section>

        <div id="clientModal" class="reveal-modal" data-reveal>
            <form action="" id="createClient_form">
              <div class="row">
                <div class="large-12 columns" id="addClientInputArea">
                  <label>Client Name : <input type="text" placeholder="Client Name" name="clientName" id="clientName" required></label>
                  <input type="text" name="memberID" id="memberID" class="hidden" value="5" />
                </div>
              </div>
              <div class="row">
                <div class="large-4 columns">
                  <input class="button expand success" value="Add Client" id="btnAddClient"/>
                </div>
              </div>
            </form>
            <a class="close-reveal-modal">&#215;</a>
        </div>

        <div id="projectModal" class="reveal-modal" data-reveal>
            <form action="" id="createProject_form">
              <div class="row" id="addProjectInputArea">
                <div class="large-12 columns">
                  <label>Project Name : <input type="text" placeholder="Project Name" name="projectName" id="projectName" required></label>
                </div>
                <div class="large-12 columns">
                  <label>Client:
                    <select name="projectClient" id="projectClient">
                      <option value="- Select Project -">- Select Value -</option>
                      <?php
                        foreach ($client as $clientName) {
                          echo'<option value="'. $clientName["name"] .'" data-id="'. $clientName["id"] .'">'. $clientName["name"] .'</option>';
                        }
                      ?>
                    </select>
                  </label>
                  <?php
                    function gwsc() {
                      $cs = array('00', '33', '66', '99', 'CC', 'FF');
                      for($i=0; $i<6; $i++) {
                        for($j=0; $j<6; $j++) {
                          for($k=0; $k<6; $k++) {
                            $c = $cs[$i] .$cs[$j] .$cs[$k];
                            echo "<option value=\"$c\">#$c</option>\n";
                          }
                        }
                      }
                    }
                  ?>
                  <select name="color"><?php gwsc(); ?></select>
                  <input type="text" name="clientID" id="clientID" class="hidden" value="" />
                </div>
              </div>
              <div class="row">
                <div class="large-4 columns">
                  <input class="button expand success" value="Add Project" id="btnAddProject"/>
                </div>
              </div>
            </form>
            <a class="close-reveal-modal">&#215;</a>
        </div>

<?php else : ?>

  <?php include 'unAuth.php'; ?>

<?php endif; ?>

<?php include 'footer.php'; ?>