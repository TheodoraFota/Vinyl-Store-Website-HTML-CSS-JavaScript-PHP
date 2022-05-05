<?php
session_start();
//gia logout
// remove all session variables
session_unset();

// destroy the session
session_destroy(); 
header("Location: home.php");//θα παει στην σελιδα την αρχικη
//die();//Print a message and terminate the current script:
?>