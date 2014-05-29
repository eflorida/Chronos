<?php
  //PHP Connection test using MeekroDB

  include_once "mkDBConfig.php";

  DB::$error_handler = false; // since we"re catching errors, don"t need error handler
  DB::$throw_exception_on_error = true;

  //Set the userCompanyID variable based on the current users info - temporarily hard-coded until programmed
  $userCompanyID = 1;

  //Ultimately, this string of queries needs to be combined into 1 query, with all table requests dependent on
  // previous table requests, starting with companyID, then array of clientID's, then array of projectID's
  //______________________________________________________________________________________
  
  //load client names and id's for project creation
  try {
    $clients = DB::query("SELECT clientName, clientID FROM clients WHERE companyID=%s", $userCompanyID);

    //$adminClients = json_encode($client);

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n";
    echo "SQL Query: " . $e->getQuery() . "<br>\n";
  }

  //load project names and id's for task creation
  try {
    $projects = DB::query("SELECT projectID, projectName FROM projects");

    //$adminProjects = json_encode($project);

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n";
    echo "SQL Query: " . $e->getQuery() . "<br>\n";
  }

  //load tasks names and id's for task creation
  try {
    $tasks = DB::query("SELECT taskID, taskName FROM tasks");

    //$adminTasks = json_encode($task);

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n";
    echo "SQL Query: " . $e->getQuery() . "<br>\n";
  }

  //load tasks names and id's for task creation
  try {
    $roles = DB::query("SELECT roleID, roleName FROM roles");

    //$adminRoles = json_encode($role);

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n";
    echo "SQL Query: " . $e->getQuery() . "<br>\n";
  }

  //______________________________________________________________________________________
   
  // restore default error handling behavior
  // don"t throw any more exceptions, and die on errors
  DB::$error_handler = "meekrodb_error_handler";
  DB::$throw_exception_on_error = false;
?>