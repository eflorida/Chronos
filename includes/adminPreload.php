<?php
  //PHP Connection test using MeekroDB

  include_once "mkDBConfig.php";

  DB::$error_handler = false; // since we"re catching errors, don"t need error handler
  DB::$throw_exception_on_error = true;

  //______________________________________________________________________________________
  
  //load client names and id's for project creation
  try {
    $client = DB::query("SELECT clientName, clientID FROM clients");

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n";
    echo "SQL Query: " . $e->getQuery() . "<br>\n";
  }

  //load project names and id's for task creation
  try {
    $project = DB::query("SELECT projectID, projectName FROM projects");

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