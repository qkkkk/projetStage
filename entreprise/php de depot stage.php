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

$email=$_SESSION['email'];

$query = "SELECT id_entreprise FROM  entreprise WHERE email='" . $email . "'" or die(mysql_error());
$result = mysqli_query($connect,$query);
        while ($data = mysqli_fetch_assoc($result)) {
            $data['id_entreprise'];
            $id_entreprise = $data['id_entreprise'];

            $type_traveaux = $_POST['type_traveaux'];
            $all_traveaux = implode(",", $type_traveaux);
            echo $all_traveaux;

            $technologies = $_POST['technologies'];
            $all_technologies = implode(",", $technologies);
            echo $all_technologies;

            $sql1 = "INSERT INTO stage ( titre, date_publication, date_debut, duree, renumeration, description, ficher, id_entreprise, nom_technologies, nom_type_traveaux)
VALUES
( '{$_POST['titre']}',now(), '{$_POST['date_debut']}', '{$_POST['duree']}','{$_POST['renumeration']}','{$_POST['description']}','{$_POST['ficher']}',$id_entreprise,'$all_traveaux','$all_technologies' )";

        }
            if (mysqli_query($connect, $sql1)) {
                echo "reussi";
            } else {
                echo "erreur " . $sql1 . "<br>" . mysqli_error($connect);

            }
?>

           /* $type_traveaux=$_POST['type_traveaux'];
            $all_traveaux=implode(",",$type_traveaux);
            echo$all_traveaux;

            $technologies=$_POST['technologies'];
            $all_technologies=implode(",",$technologies);
            echo$all_technologies;

            $identifiant=mysqli_insert_id($connect);



            $sql2 = "INSERT INTO type_traveaux (nom, id_stage)
VALUES
('$all_traveaux', $identifiant)";


            $sql3 = "INSERT INTO technologies (nom, id_stage)
VALUES
('$all_technologies',$identifiant)";


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
        }
?> */


//$id_entreprise = mysqli_query($connect,$query);
//echo $id_entreprise;
//$lignes = mysqli_num_rows($id_entreprise);
//echo $lignes;



//$id_entreprise = mysqli_query($connect,"SELECT id_entreprise FROM  entreprise WHERE email='" . $_SESSION['email'] . "'") or die(mysql_error());






?>