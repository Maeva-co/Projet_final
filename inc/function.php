<?php 
function login($base, $mail, $psw) {
    $sql = "SELECT * FROM membre WHERE email = '%s'";
    $sql = sprintf($sql, $mail);
    $result = mysqli_query($base, $sql);
    $res = mysqli_fetch_assoc($result);
    if($res['mot_de_passe'] == $psw) {
        return $res['id_membre'];
    } else {
        return 0;
    }
}

function sign_up($base, $nom, $dtn, $genre, $mail, $ville, $psw) {
    $sql = "INSERT INTO membre(nom, date_de_naissance, genre, email, ville, mot_de_passe, image_profil) VALUES ('%s', '%s', '%s', '%s', '%s', '%s','default')";
    $sql = sprintf($sql, $nom,$dtn,$genre, $mail, $ville, $psw);
    mysqli_query($base, $sql);
}

function get_list_objet ($base)
{
    $sql = "SELECT * FROM objet";
    $result = mysqli_query($base, $sql);
    return $result;
}

function verify_emprunt($base, $id_objet)
{
    $sql = "SELECT * FROM v_current_emprunt WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_objet);
    $result = mysqli_query($base, $sql);
    $donnees = mysqli_fetch_assoc($result);
    if (empty($donnees))
    {
        return 0;
    }
    else
    {
        return 1;
    }
}
?>