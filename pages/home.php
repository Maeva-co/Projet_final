<?php
    include ('../inc/connexion.php'); 
    include ('../inc/function.php');

    $result = get_list_objet($base);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Liste des objets</h1>
    <?php while ($donnees = mysqli_fetch_assoc($result)) {?> 
        <p><?php echo $donnees['nom_objet']; ?></p>
        <?php $emprunt = verify_emprunt($base, $donnees['id_objet']);
        if ($emprunt != 0)
        {
            echo 'en cours';
        }
        ?>
    <?php } ?>
</body>
</html>