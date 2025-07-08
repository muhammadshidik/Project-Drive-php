<?php

$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$hostdatabase = "db_drive";
$config = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);
if (!$config) {
    echo "Koneksi gagal";
}
