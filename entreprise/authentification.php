<?php
session_start();
$_SESSION['email'] = $_POST['email'];

$conn = mysqli_connect("localhost","root","root","gestiondesstages");
if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}

if((isset($_POST['email']))&&
    (isset($_POST['password']))) {
    if ((!empty($_POST['email'])) &&
        (!empty($_POST['password']))
    ) {
        $query = "SELECT * FROM entreprise where email='" . $_POST['email'] . "' and mot_passe='" . $_POST['password'] . "'";

        $result = mysqli_query($conn, $query);
        $lignes = mysqli_num_rows($result);
        if ($lignes > 0) {
            header("Location: entreprise depot stage.php");
//确保重定向后，后续代码不会被执行
            exit;
        } else {
            $message = "mot de passe faux";
            echo $message; header("Location: entreprise.php");
            exit;
        }
    }  header("Location: entreprise.php");
}

?>