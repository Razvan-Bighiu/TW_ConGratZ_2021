<?php

$serverName="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="login_cardview";

$conectare=mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conectare) {
    die("Conectare esuata: ".mysqli_connect_error());
}