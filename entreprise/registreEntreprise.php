<php 
    ?>
<html lang="fr">
<head>
    <meta charset ="utf-8">
    <title>formulaire d'inscription</title>

</head>
<body>
<strong style="font-size:25px; color:black;" id="titreform">Formulaire d'inscription</strong><br/><br/>
<form action="registre.php", method="post">
    <div style="font-size:25px; color:gray">
        <table align="left">
            <tr>
                <td style="font-size:20px"><strong>secteur d'activité</strong></td>
                <td>
                    <SELECT name="secteur d'activité" style="font-size:17px;">
                        <OPTION VALUE="selectionner_secteur">selectionner un secteur</OPTION>
                        <OPTION VALUE="industrie">Industries</OPTION>
                        <OPTION VALUE="commerce">Commerce</OPTION>
                        <OPTION VALUE="Enseignement">Enseignement</OPTION>
                        <OPTION VALUE="santé">Santé</OPTION>
                        <OPTION VALUE="construction">Construction</OPTION>
                        <OPTION VALUE="immobilier">Immobilier</OPTION>
                        <OPTION VALUE="administration">Administration</OPTION>
                        <OPTION VALUE="Transport">Transport</OPTION>
                        <OPTION VALUE="arts">Arts</OPTION>

                    </SELECT>
                </td>
            </tr>
            <tr><td style="font-size:20px;"><label for="nom_entreprise"><strong>Nom Entreprise</strong></label></td><td><input type="text" name="" id="nom_entreprise" size="25" maxlength="20" /></td></tr>
            <tr><td style="font-size:20px;"> <label for="pwd"><strong>mot de passe</strong></label></td><td><input type="password" name="pwd" id="pwd" size="25" maxlength="20" /></td></tr>
            <tr><td style="font-size:20px;"> <label for="pwd2"><strong>Confirmer mot de passe</strong></label></td><td><input type="password" name="pwd2" id="pwd2" size="25" maxlength="20" /></td></tr>
            <tr><td style="font-size:20px;"><label for="email"><strong>Email</strong></label></td><td><input type="text" name="email" id="email" size="25" maxlength="20" /></td></tr>
            <tr><td style="font-size:20px;"><label for="rue"><strong>Rue</strong></label></td><td><input type="text" name="rue" id="rue" size="25" maxlength="20" /></td></tr>
            <tr><td style="font-size:20px;"><label for="code_postale"><strong>Code Postale</strong></label></td><td><input type="text" name="code_postale" id="code_postale" size="25" maxlength="20" /></td></tr>

            <tr><td><input type="submit" name="submit" value="valider"></td></tr>
        </table>
    </div>
</form>
</html>











