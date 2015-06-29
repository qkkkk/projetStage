<?php
session_start();

$connect = mysqli_connect("localhost", "root", "root", "gestiondesstages");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}

$id_annonce=$_POST['id_annonce'];
// $toUpdate=$_POST['toUpdate'];
echo $id_annonce;

if (isset ($_POST['valider'])&& !isset($_POST['annuler'])){

        $query = "SELECT * FROM  stage where id_stage = $id_annonce" or die(mysql_error());
        $result = mysqli_query($connect, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            $id_stage = $data['id_stage'];
             echo $id_stage;
            //echo $_POST[$data['id_stage']];

            $type_traveaux = $_POST['type_traveaux'];
            $all_traveaux = implode(",", $type_traveaux);
            echo $all_traveaux;

            $technologies = $_POST['technologies'];
            $all_technologies = implode(",", $technologies);
            echo $all_technologies;

            $sql1 = "UPDATE stage SET titre= '{$_POST['titre']}',valide='{$_POST['etat']}', date_publication= now(), date_debut= '{$_POST['date_debut']}', description= '{$_POST['description']}',duree= '{$_POST['duree']}',renumeration= '{$_POST['renumeration']}', nom_technologies = '$all_traveaux',nom_type_traveaux= '$all_technologies'  where id_stage= $id_annonce";
        }
    if (mysqli_query($connect, $sql1)) {
        echo "reussi";
    } else {
        echo "erreur " . $sql1 . "<br>" . mysqli_error($connect);

    }

            //ysqli_query($connect, "UPDATE stage SET titre= '{$_POST['titre']}',valide='{$_POST['etat']}', date_publication= now(), date_debut= '{$_POST['date_debut']}',duree= '{$_POST['duree']}',renumeration= '{$_POST['renumeration']}', nom_technologies = '$all_traveaux',nom_type_traveaux= '$all_technologies' , where id_stage= $id_annonce");

          //  mysqli_error($connect);


            //header("Location: entreprise depot stage.php");
//确保重定向后，后续代码不会被执行
            exit;

    }


else{
    header("Location: entreprise depot stage.php");
//确保重定向后，后续代码不会被执行
    exit;
}
?>
