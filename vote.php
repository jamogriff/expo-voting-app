<?php
session_start(); // not really using sessions in this app, but whatever.

/* ---------------------------------------------------------------
This is a voting application intended to be used for Expo's People's Choice Award.
It pulls team names from a MYSQL database, and users can select their team of choice,
which are then saved into their own table in the database. The app also blocks repeat IP addresses
from voting multiple times.
------------------------------------------------------------------ */

require_once('header.php'); // contains CSS stylesheet, etc.
require_once('db_creds.php'); // contains database credentials to login to MYSQL
require_once('db_functions.php'); // functions associated with connecting to database
require_once('query_functions.php'); // functions associated with querying database
require_once('validations.php'); // functions associated with filtering out duplicate IP addresses.
require_once('functions.php'); // miscellaneous functions

// !!!!!!!!!!HEY YOU!!!!!!!!!!!!!!
/* Uncomment this line to close voting: 
redirect_to('voting_closed.php'); */

// ----------------------------------------------------------------

$db = db_connect(); // connects to MYSQL database. If unable to connect, throws an error.

$teams = find_all_teams(); // Select query to find all teams to populate the options for the voting app.
$rows = mysqli_num_rows($teams); // Number of teams. Used for an if statement in the form below.

// ---------------------------------------------------------------- ?>

<div class="jumbotron">

<?php
if (isset($_POST['submit'])) { // If user has selected an option and hit "Go"...

  if(check_ip() == true) { // check_ip() queries the votes table to see if a matching IP address exists.
    redirect_to('voted.php'); // If IP address exists, then user is sent to a different page (i.e. they can't vote again)
  }
  else { // If a matching IP address does not exist in the database.
    $selection = $_POST['voting']; // enumerates what selection user made in the form.
    $sanitized = mysqli_real_escape_string($db, $selection); // !! IMPORTANT !! This will escape single quotes that interfere with the SQL query.

    vote($sanitized); // this vote function lives in query_functions. It will insert the vote into the database.
    echo "<h1 class='display-4'>Thank you for voting!</h1>";
    echo "<p class='lead'>You voted for: ".$selection."</p><hr class='my-4'>"; // showing $selection instead of sanitized means the escape / doesn't show to the user.
  }
}

else { // if user has not made a $selection...
echo "<h1 class='display-4'>The People's Choice Award</h1><br><p class='lead'>The People's Choice Award is intended to highlight our community's choice for the project that best exemplifies an innovative spirit to solve human problems. Vote for the project that resonated with you during this year's Expo, or vote for your friends and family.</p><hr class='my-4'>"; }

?>

 <form method="POST" action="vote.php" class="text-center">
   <?php if ($rows > 0) { // if the number of teams is larger than 0... ?>
   <div class="form-group">
     <label for="votingForm"><h5>Team Name (in alphabetical order):</h5></label>
     <select class="form-control" name ="voting">
       <?php while ($row = mysqli_fetch_assoc($teams)) { // while each row of data is equal to its associative array...
         echo "<option>".$row['team_name']."</option>"; // populates each html option with the team name of each row.
       }?>
     </select>
   </div> <?php } // needs closing bracket for if loop ?>
   <input class="btn btn-primary btn-lg  btn-block mb-2" type="submit" name="submit" value="Submit"></input>
</form>

</div> <!-- Jumbotron closing div -->
