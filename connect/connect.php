<?php
session_start();
$connect = mysqli_connect("localhost","root","root","gestiondesstages");
if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}
?>