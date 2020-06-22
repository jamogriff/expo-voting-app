<?php

// Removed actual database table and column names for security reasons 

// Used to populate all teams into the option fields
function find_all_teams() {
  global $db;
  $sql = "SELECT * FROM # ORDER BY # ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

// Used to enter a vote into the database
function vote($ballot) {
  global $db;
  $ip = $_SERVER['REMOTE_ADDR'];
  $ip_test = get_client_ip(); // not really nessary for functionality, it's just being used because the # column has to be filled.
  $stmt = "INSERT INTO # (#, timestamp, #, #) VALUES ('$ballot', now(), '$ip', '$ip_test')";
  $result = mysqli_query($db, $stmt);
  confirm_result_set($result);
  return $result;
}

// Used to populate all teams into the option fields
function teams_with_votes() {
  global $db;
  $sql = "SELECT * FROM #";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

// You could also accomplish this for efficiently using foriegn keys between the MYSQL tables. 
function results($project) {
  global $db;

  $query = "SELECT * FROM # WHERE # = '$project'";
  $result = mysqli_query($db, $query);
  confirm_result_set($result);
  $votes = mysqli_num_rows($result);
  return $votes;
}



?>
