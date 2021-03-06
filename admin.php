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

          <section id="main-section">
            <div class="row">
              <div class="small-12 medium-8 medium-offset-2 columns">
                  <a class="button expand" data-reveal-id="clientModal" data-reveal>Create Client</a>
              </div>
              <div class="small-12 medium-8 medium-offset-2 columns">
                  <a class="button expand" data-reveal-id="projectModal" data-reveal>Create Project</a>
              </div>
              <div class="small-12 medium-8 medium-offset-2 columns">
                  <a class="button expand" data-reveal-id="taskModal" data-reveal>Create Task</a>
              </div>
              <div class="small-12 medium-8 medium-offset-2 columns">
                  <a href="edit-profile.php" class="button expand success" >Edit Profile</a>
              </div>
              <div class="small-12 medium-8 medium-offset-2 end columns">
                  <a href="includes/logout.php" class="button expand alert" >Log Out</a>
              </div>
            </div>
          </section>

        </header>

        <div id="clientModal" class="reveal-modal" data-reveal>
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
                <div class="small-12 columns" id="addClientInputArea">
                  <label>Client Name : <input type="text" placeholder="Client Name" name="clientName" id="clientName" required></label>
                  <input type="text" name="memberID" id="memberID" class="hidden" value="5" />
                </div>
                <div class="small-12 columns gifLoader hidden">
                  <img src="img/loader.gif" width="24px" />
                </div>
              </div>
              <div class="row" id="clientAddSubmit">
                <div class="small-12 columns">
                  <input class="button expand success" value="Add Client" id="btnAddClient"/>
                </div>
              </div>
            </form>
            <a class="close-reveal-modal">&#215;</a>
        </div>

        <div id="projectModal" class="reveal-modal" data-reveal>
          <form action="" id="createProject_form">
            <div class="row hidden" id="projectAddedText">
              <div class="small-12 columns">
                <h3>Project Added!</h3>
              </div>
            </div>
            <div class="row hidden" id="projectAddError">
              <div class="small-12 columns">
                <h5>Sorry, there was an error submitting the data.</h5>
              </div>
            </div>
            <div class="row" id="addProjectInputArea">
              <div class="small-12 columns">
                <label>Project Name : <input type="text" placeholder="Project Name" name="projectName" id="projectName" required></label>
              </div>
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
                <input id="roleSelector" type="checkbox"><label for="roleSelector">Add Billing Categories</label>
                <div class="row collapse hidden" id="addRoleInput">
                  <div class="row">
                    <label>Billing Categories</label>
                    <div class="small-9 columns">
                      <input type="text" placeholder="billing category" class="newRoleName" />
                    </div>
                    <div class="small-3 columns">
                      <span class="postfix">+</span>
                    </div>
                  </div>
                  <a class="button" href="#" id="addAnotherRole">Add Another</a>
                </div>
              </div>
            </div>
            <div class="row gifLoader hidden">
              <div class="small-12 columns">
                <img src="img/loader.gif" width="24px" />
              </div>
            </div>
            <div class="row" id="projectAddSubmit">
              <div class="small-12 columns">
                <input class="button expand success" value="Add Project" id="btnAddProject"/>
              </div>
            </div>
          </form>
          <a class="close-reveal-modal">&#215;</a>
        </div>

        <div id="taskModal" class="reveal-modal" data-reveal>
          <form action="" id="createTask_form">
            <div class="row hidden" id="taskAddedText">
              <div class="small-12 columns">
                <h3>Task Added!</h3>
              </div>
            </div>
            <div class="row hidden" id="taskAddError">
              <div class="small-12 columns">
                <h5>Sorry, there was an error submitting the data.</h5>
              </div>
            </div>
            <div class="row" id="addTaskInputArea">
              <div class="small-12 columns">
                <label>Task Name : <input type="text" placeholder="Task Name" name="taskName" id="taskName" required></label>
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
            <div class="row gifLoader hidden">
              <div class="small-12 columns">
                <img src="img/loader.gif" width="24px" />
              </div>
            </div>
            <div class="row" id="taskAddSubmit">
              <div class="small-12 columns">
                <input class="button expand success" value="Add Task" id="btnAddTask"/>
              </div>
            </div>
          </form>
          <a class="close-reveal-modal">&#215;</a>
        </div>

<?php else : ?>
<!-- The user is NOT logged in, so redirect to login page -->
  <script>
    window.location.href="http://localhost:8080/chronos/index.php";
  </script>
<?php endif; ?>

<?php include 'footer.php'; ?>