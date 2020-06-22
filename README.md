# expo-voting-app
 
 This is a simple web-app that allows users easily vote for the Inworks Expo People's Choice award. It was created in PHP with a MySQL database and Bootstrap 4's CSS framework.
 User's can choose from dynamically populated data to cast their vote and are met with a confirmation page. The web app includes a basic method of cross-referencing duplicate IP address entries by using a $_SERVER superglobal, so user's cannot vote twice.
 
 A Walkthough of the file structure:
 - Most files in this repository are dedicated and categorized functions. Since this is a basic voting app, there really isn't a need to have all of these separate function files. Merging all functions under one functions.php file would be useful at a future date.
 - vote.php is the intended landing page for the user. If it's the user's first vote, the page will reload as a confirmation page. If the user has already voted (and their IP address exists in the database), then the user will get redirected to voted.php.
 - results.php should likely be password protected, since potentially only admins should have access to the results. This page doesn't have front-end design, since it's just the raw data that counts.
 
Lessons learned in this Project:
- Sanitize your SQL queries. All team names would enter as intended into the database, except the names that had a hyphen in the name. This hyphen would pre-maturely end the intended SQL query and the vote was not counted. Using mysqli_real_escape_string() fixed this bug nicely.
- Most $_SERVER superglobals aren't terribly useful.
