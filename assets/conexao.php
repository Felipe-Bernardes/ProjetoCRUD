<?php
    global $con;
    try{
        $con = new PDO("mysql:host=localhost;dbname=sistemacrud", "root", "usbw");
    }catch(PDOException $e){
        echo "Erro na conexão. ERRO: ". $e->getMessage();
    }
?>