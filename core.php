<?php
session_start();
require_once("config.php");

// requiring session login
if (!isset($_SESSION['loggedin']) || !$_SESSION["loggedin"] === true) {
	header("Location: login.php");
}

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Could not connect to database; ERROR: ".mysqli_connect_error());
//set encoding
mysqli_set_charset($dbc, "utf8");

function debugit($str) {
	error_log(date("Y-m-d H:i:s").":  ".$str."\n", 3, LOG_FILE);
}

$is_error = false;
$message = "";
if (array_key_exists("success", $_GET)) {
	$message = $_GET["success"];
}
if (array_key_exists("error", $_GET)) {
	$message = $_GET["error"];
	$is_error = true;
}


