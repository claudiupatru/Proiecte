<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "servicii_la_domiciliu";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
