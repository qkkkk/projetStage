<?php
session_start();

    $connect = mysqli_connect("localhost", "root", "root", "gestiondesstages");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }
    $req = "select * from entreprise";
    $select = mysqli_query($connect, $req);
    //$lignes = mysqli_num_rows($select);
   // $identifiant = $lignes;

    $sql1 = "INSERT INTO entreprise (nom_entreprise,email, tel, site_web, mot_passe)
VALUES
('{$_POST['nom_entreprise']}','{$_POST['email']}', '{$_POST['tel']}', '{$_POST['site_web']}','{$_POST['password']}')";


    if (mysqli_query($connect, $sql1)) {
        echo "reussi";
    } else {
        echo "erreur " . $sql1 . "<br>" . mysqli_error($connect);

    }
$identifiant=mysqli_insert_id($connect);
$sql2 = "INSERT INTO adresse (adresse, cp, ville, pays, id_entreprise)
VALUES
('{$_POST['adresse']}','{$_POST['cp']}', '{$_POST['ville']}', '{$_POST['pays']}', $identifiant)";


$sql3 = "INSERT INTO contact (nom_contact,fonction,id_entreprise )
VALUES
('{$_POST['nom_contact']}','{$_POST['fonction']}', $identifiant)";
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

/*if(isset($_POST['submit'])){

    //if($_POST['nom_entreprise']&&$_POST['email']&&$_POST['tel']&&$_POST['site_web']&&$_POST['ville']&&$_POST['cp']&&$_POST['nom_entreprise']&&$_POST['password']&&$_POST['repeatpassword']){
        if($_POST['password']==$_POST['repassword']){
            if(strlen($_POST['password'])>4){


                $_POST['password']= md5($_POST['password']);
                $_POST['repassword']= md5($_POST['repassword']);



            }else echo"le mot de passe tres court";

        }else echo "les mots de passes ne sont pas identiques";


   // } else echo "veuillez saisir tous les champs";




}*/

?>