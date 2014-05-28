<?php
  //PHP Connection test using MeekroDB

  include_once "mkDBConfig.php";

  DB::$error_handler = false; // since we"re catching errors, don"t need error handler
  DB::$throw_exception_on_error = true;
   
  try {
    //Insert Meek Query Here
    DB::insert("clients", array(
      "clientName"  => $_POST['clientName'],
      "memberID"    => $_POST['memberID']
  ));

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n"; // something about duplicate keys
    echo "Variables: name=" . $_POST['clientName'] . " memberID=" . $_POST['memberID']; //display post values submitted
    echo "SQL Query: " . $e->getQuery() . "<br>\n"; // INSERT INTO accounts...
  }
   
  // restore default error handling behavior
  // don"t throw any more exceptions, and die on errors
  DB::$error_handler = "meekrodb_error_handler";
  DB::$throw_exception_on_error = false;
?>