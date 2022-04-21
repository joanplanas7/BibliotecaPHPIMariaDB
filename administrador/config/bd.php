<?php
    $host = "localhost";
    $bd = "projectephp";
    $usuari = "root";
    $contra = "";

    try {
        $conexio = new PDO("mysql:host=$host;dbname=$bd", $usuari, $contra);
    } catch (Exception $ex) {
        echo $ex -> getMessage();
    }

?>