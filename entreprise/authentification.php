<?php
session_start();
$_SESSION['email'] = $_POST['email'];

$conn = mysqli_connect("localhost","root","root","gestiondesstages");
if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}
$query = "SELECT * FROM entreprise where email='" . $_POST['email'] . "' and mot_passe='" . $_POST['password'] . "'";

$result = mysqli_query($conn,$query);
$lignes = mysqli_num_rows($result);
if($lignes>0){
    header("Location: entreprise depot stage.php");
//确保重定向后，后续代码不会被执行
    exit;  ;
} else{
    echo 'not good!';
}

?>