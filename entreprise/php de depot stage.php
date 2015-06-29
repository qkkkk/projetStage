<?php
session_start();

$connect = mysqli_connect("localhost", "root", "root", "gestiondesstages");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}
//$req = "select * from stage";
//$select = mysqli_query($connect, $req);
//$lignes = mysqli_num_rows($select);
//$identifiant = $lignes;

$email = $_SESSION['email'];

if((isset($_POST['titre']))&&
(isset($_POST['date_publication']))&&
(isset($_POST['date_debut']))&&
(isset($_POST['duree']))&&
(isset($_POST['lieu']))&&
(isset($_POST['renumeration']))&&
(isset($_POST['description']))&&
(isset($_POST['type_traveaux']))&&
(isset($_POST['technologies']))) {
    if ((!empty($_POST['titre'])) &&
        (!empty($_POST['date_publication'])) &&
        (!empty($_POST['date_debut'])) &&
        (!empty($_POST['duree'])) &&
        (!empty($_POST['lieu'])) &&
        (!empty($_POST['renumeration'])) &&
        (!empty($_POST['description'])) &&
        (!empty($_POST['type_traveaux'])) &&
        (!empty($_POST['technologies']))

    ) {

        $query = "SELECT id_entreprise FROM  entreprise WHERE email='" . $email . "'" or die(mysql_error());
        $result = mysqli_query($connect, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            $data['id_entreprise'];
            $id_entreprise = $data['id_entreprise'];

            $type_traveaux = $_POST['type_traveaux'];
            $all_traveaux = implode(",", $type_traveaux);
            echo $all_traveaux;

            $technologies = $_POST['technologies'];
            $all_technologies = implode(",", $technologies);
            echo $all_technologies;

            $sql1 = "INSERT INTO stage ( titre, date_publication, date_debut, duree, lieu, renumeration, description, ficher, id_entreprise, nom_technologies, nom_type_traveaux)
VALUES
( '{$_POST['titre']}',now(), '{$_POST['date_debut']}', '{$_POST['duree']}','{$_POST['lieu']}','{$_POST['renumeration']}','{$_POST['description']}','{$_POST['ficher']}',$id_entreprise,'$all_traveaux','$all_technologies' )";

        }
        if (mysqli_query($connect, $sql1)) {
            echo "reussi";
        } else {
            echo "erreur " . $sql1 . "<br>" . mysqli_error($connect);

        }
        header("Location: entreprise depot stage.php");
//确保重定向后，后续代码不会被执行
        exit;

    }
    echo "remplir";
} header("Location: entreprise depot stage.php");



?>







