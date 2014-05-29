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

        <section id="time">
          <div class="row">
            <form action="" id="createClient_form">
              <div class="row hidden" id="clientAddedText">
                <div class="small-12 columns">
                  <h3>Client Added!</h3>
                </div>
              </div>
              <div class="row hidden" id="clientAddError">
                <div class="small-12 columns">
                  <h5>Sorry, there was an error submitting the data.</h5>
                </div>
              </div>

              <div class="row">
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

              <div class="row" id="clientAddSubmit">
                <div class="small-12 columns">
                  <input class="button expand success" value="Add Client" id="btnAddClient"/>
                </div>
              </div>
            </form>
          </div>
        </section>

<?php else : ?>

  <?php include 'unAuth.php'; ?>

<?php endif; ?>

<?php include 'footer.php'; ?>