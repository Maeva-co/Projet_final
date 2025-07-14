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
    $sql = "INSERT INTO membre ('%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, $nom,$dtn,$genre, $mail, $ville, $psw);
    mysqli_query($base, $sql);
}
?>