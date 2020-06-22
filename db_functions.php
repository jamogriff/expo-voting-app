<?php

// Connects to database, and confirms that database is actually connected.
function db_connect() {
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect($connection);
  return $connection;
}
// Checks to see if the database is actually connected.
function confirm_db_connect($connection) {
  if($connection->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error; // displays error description.
    $msg .= " (". $connection->connect_errno .")"; // displays error number.
    exit($msg);
  }
}

// Not being used. Would use this if we were using an empty field instead of pre-populated.
function db_escape($connection, $string) {
  return mysqli_real_escape_string($connection, $string);
}

// This will confirm that a query result set is successful. If it isn't a match/or a valid query it will throw an error.
function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Your vote was not counted. Please try again.");
    }
  }

  ?>
