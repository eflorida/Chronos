<?php
  //PHP Connection test using MeekroDB

  include_once 'mkDBConfig.php';

  DB::$error_handler = false; // since we're catching errors, don't need error handler
  DB::$throw_exception_on_error = true;
   
  try {
    $results = DB::query("SELECT * FROM projects");
    foreach ($results as $row){
      echo 'Project ID = ' , $row['id'] , '<br>';
      echo 'Project Name = ' , $row['name'] , '<br>';
      echo 'Color = ' , $row['color'] , '<br>';
      echo 'ClientID = ' , $row['clientID'] , '<br>';
    };
  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n"; // something about duplicate keys
    echo "SQL Query: " . $e->getQuery() . "<br>\n"; // INSERT INTO accounts...
  }
   
  // restore default error handling behavior
  // don't throw any more exceptions, and die on errors
  DB::$error_handler = 'meekrodb_error_handler';
  DB::$throw_exception_on_error = false;
?>