<?php
$koneksi = mysqli_connect("localhost","root","","akademik1");
function open_connection() {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "akademik1";
	$koneksi  = mysqli_connect($hostname, $username, $password, $dbname);
	return $koneksi;
}
?>