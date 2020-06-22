<?php

/* This is the results page for the voting app.
It introduces a function called results which will match
team names from the team table to the number of their
respective occurances in the votes table. */

include('header.php');
require_once('query_functions.php');
require_once('db_functions.php');
require_once('db_creds.php');

// --------------------------------------

$db = db_connect(); // connects to MYSQL database. If unable to connect, throws an error.

$teams = find_all_teams(); // Select query to find all teams to populate the options for the voting app.
$rows = mysqli_num_rows($teams); // Number of teams. Used for an if statement in the form below.

// ---------------------------------------

if($rows > 0) {
  echo "<table><tr>";
  echo "<th>Team Name</th>";
  echo "<th>Votes</th></tr>";
  while ($row = mysqli_fetch_assoc($teams)) {
    echo "<tr><td>".$row['team_name']."</td>";
    $sanitized = mysqli_real_escape_string($db, $row['team_name']); // escapes single quotes that interfere with SQL query
    $votes = results($sanitized);
    echo "<td>".$votes."</td></tr>";
  } echo "</table>";
}


?>
