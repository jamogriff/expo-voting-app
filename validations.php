<?php
// Removed database table and column names due to security reasons

// This function checks to see if the user's IP address has already been added to the votes table
function check_ip() {
  global $db;
  $ip = $_SERVER['REMOTE_ADDR'];

  $ip_exists = '';
  $stmt = "SELECT * FROM # WHERE ip = '$ip'";
  $result = mysqli_query($db, $stmt);
  $numresults = mysqli_num_rows($result);

  if ($numresults > 0) {
    $ip_exists = true; // IP address exists in votes table
   }
  else {
    $ip_exists = false;
  }
  return $ip_exists;
}

// this function runs through multiple options for finding the client's IP address.
// REMOTE_ADDR seems to be the only one working, so this function really isn't useful.
// Only reason I'm keeping it in is as a failsafe...
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      }
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
    else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      }
    else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      }
    else if(isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
      }
    else if(isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
      }
    else {
        $ipaddress = 'UNKNOWN';
      }
    return $ipaddress;
}

?>
