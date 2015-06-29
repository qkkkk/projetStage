<?php
session_start();

$connect = mysqli_connect("localhost", "root", "root", "gestiondesstages");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}

$id_annonce=$_POST['id_annonce'];
echo $id_annonce;

$query = "SELECT * FROM  stage where id_stage = $id_annonce" or die(mysql_error());
$result = mysqli_query($connect,$query);
while ($data = mysqli_fetch_assoc($result)) {
     $id_stage= $data['id_stage'];
   // echo $_POST[$data['id_stage']];
echo $_POST[$data['id_stage']];

   if ($_POST[$data['id_stage']] == "valide") {
        mysqli_query($connect, "UPDATE stage SET valide = 1  where id_stage= $id_annonce");
    }
    else if  ($_POST[$data['id_stage']] == "refuse") {
        mysqli_query($connect, "UPDATE stage SET valide = 2 where id_stage=$id_annonce ");
    }
    else if  ($_POST[$data['id_stage']] == "") {
    }


    header("Location: enseignant validation stage.php");
//确保重定向后，后续代码不会被执行
    exit;}







