<?php

$config = array(

	'host' => "127.0.0.1",
	'user' => "root",
	'pass' => "",
	'dbconn' => "predictioncar",
	'charset' => "utf8",

);

$conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['dbconn']);
$conn->set_charset($config['charset']);

if ($conn->connect_error) {
	trigger_error("Database connect failed" . $conn->connect_error, E_USER_ERROR); // E_USER_ERROR = error type [$conn -> function ] Poitter
} else {
	echo "";
}