<?php
    include_once "../assets/crudsystem.php";

    $PEGA_ID = $_GET["id"];
    $deletuser = new CRUD;
    $deletuser->DeletarUser($PEGA_ID);

    header('Location: adm.php');
?>