<?php
session_start();

$connect = mysqli_connect("localhost", "root", "root", "gestiondesstages");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}
$req = "select * from stage";
$select = mysqli_query($connect, $req);
//$lignes = mysqli_num_rows($select);
//$identifiant = $lignes;

$email=$_SESSION['email'];
$req2= "SELECT id_entreprise from entreprise where email= $email";
$id_entreprise = mysqli_query($connect, $req2);

$sql1 = "INSERT INTO stage ( titre, date_publication, date_debut, duree, renumeration, description, ficher, id_entreprise)
VALUES
( '{$_POST['titre']}',now(), '{$_POST['date_debut']}', '{$_POST['duree']}','{$_POST['renumeration']}','{$_POST['description']}','{$_POST['ficher']}',$id_entreprise)";


if (mysqli_query($connect, $sql1)) {
    echo "reussi";
} else {
    echo "erreur " . $sql1 . "<br>" . mysqli_error($connect);

}


$identifiant=mysqli_insert_id($connect);
$sql2 = "INSERT INTO type_traveaux (nom, id_stage)
VALUES
('{$_POST['type_traveaux']}', $identifiant)";

$sql3 = "INSERT INTO technologies (nom, id_stage)
VALUES
('{$_POST['technologies']}', $identifiant)";




if (mysqli_query($connect, $sql2)) {
    echo "reussi";
} else {
    echo "erreur " . $sql2 . "<br>" . mysqli_error($connect);

}

if (mysqli_query($connect, $sql3)) {
    echo "reussi";
} else {
    echo "erreur " . $sql3 . "<br>" . mysqli_error($connect);

}