<?php
  //PHP Connection test using MeekroDB

  include_once "mkDBConfig.php";

  DB::$error_handler = false; // since we"re catching errors, don"t need error handler
  DB::$throw_exception_on_error = true;
   
  try {
    //Insert Meek Query Here
    DB::insert("tasks", array(
      "taskName"      => $_POST['taskName'],
      "projectID"      => $_POST['projectID'],
      "roleID"  => $_POST['roleID']
  ));

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n"; // something about duplicate keys
    echo "Variables: taskName=" . $_POST['taskName'] . " projectID=" . $_POST['projectID'] . " roleID=" . $_POST['roleID']; //display post values submitted
    echo "SQL Query: " . $e->getQuery() . "<br>\n"; // INSERT INTO accounts...
  }
   
  // restore default error handling behavior
  // don"t throw any more exceptions, and die on errors
  DB::$error_handler = "meekrodb_error_handler";
  DB::$throw_exception_on_error = false;
?>