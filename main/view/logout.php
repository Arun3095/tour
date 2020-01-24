<?php
// Initialize the session.
// session_start();
// Unset all of the session variables.
unset($_SESSION["UserData"]);
// Finally, destroy the session.    
session_destroy();

// Include URL for Login page to login again.
 echo '<meta http-equiv="refresh" content="2;URL=../index.php" />';
exit;
?>
