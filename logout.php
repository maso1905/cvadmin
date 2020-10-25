<?php    
require 'errors.php';
session_start(); 
session_unset(); 
session_destroy(); 
// Sends to home page of client when logged out
header("Location: http://studenter.miun.se/~maso1905/dt173g/cvproject/pub/"); 
exit(); 