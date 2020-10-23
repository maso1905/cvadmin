<?php
session_start(); // Start sessionen

// Reports errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Auto load of classes
function __autoload($class_name)
{
 include "classes/" . $class_name . ".class.php";
}