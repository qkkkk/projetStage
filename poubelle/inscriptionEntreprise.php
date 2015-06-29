<?php
session_start();

    $connect = mysqli_connect("localhost", "root", "root", "gestiondesstages");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    }

    //$lignes = mysqli_num_rows($select);
   // $identifiant = $lignes;


if((isset($_POST['nom_entreprise']))&&
    (isset($_POST['email']))&&
    (isset($_POST['tel']))&&
    (isset($_POST['site_web']))&&
    (isset($_POST['adresse']))&&
    (isset($_POST['ville']))&&
    (isset($_POST['pays']))&&
    (isset($_POST['cp']))&&
    (isset($_POST['nom_contact']))&&
    (isset($_POST['fonction']))&&
    (isset($_POST['password']))&&
    (isset($_POST['repassword']))) {
    if ((!empty($_POST['nom_entreprise'])) &&
        (!empty($_POST['email'])) &&
        (!empty($_POST['tel'])) &&
        (!empty($_POST['site_web'])) &&
        (!empty($_POST['adresse'])) &&
        (!empty($_POST['ville'])) &&
        (!empty($_POST['pays'])) &&
        (!empty($_POST['cp'])) &&
        (!empty($_POST['nom_contact'])) &&
        (!empty($_POST['fonction'])) &&
        (!empty($_POST['password'])) &&
        (!empty($_POST['repassword']))
    ) {
        if ($_POST['password'] == $_POST['repassword']) {
            // if(strlen($_POST['password'])>4){

            $req = "select * from entreprise";
            $select = mysqli_query($connect, $req);

            $sql1 = "INSERT INTO entreprise (nom_entreprise,email, tel, site_web, mot_passe)
VALUES
('{$_POST['nom_entreprise']}','{$_POST['email']}', '{$_POST['tel']}', '{$_POST['site_web']}','{$_POST['password']}')";


            if (mysqli_query($connect, $sql1)) {
                echo "reussi";
            } else {
                echo "erreur " . $sql1 . "<br>" . mysqli_error($connect);

            }
            $identifiant = mysqli_insert_id($connect);
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

            header("Location: entreprise.php");
            // $_POST['password']= md5($_POST['password']);
            //$_POST['repassword']= md5($_POST['repassword']);

        } else echo "les mots de passes ne sont pas identiques";
        // }else echo"le mot de passe tres court";

    } else echo "veuillez saisir tous les champs";
}

?>