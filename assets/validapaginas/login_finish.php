<?php
    include_once "../crudsystem.php";

    $btnLogin = $_POST["btnLogin"];
    $nome = addslashes($_POST["usertxt"]);
    $senha = addslashes($_POST["passtxt"]);

    $_SESSION["erro"] = 0;

    $user = new CRUD;

    if($btnLogin){
        if(!empty($nome) && !empty($senha)){
            $fetchuser = $user->EntrarUser($nome, $senha); 
            
            if($fetchuser){
                foreach($fetchuser as $item){
                    $_SESSION["nome"] = $item["usu_nome"];
                    $_SESSION["email"] = $item["usu_email"];
                    $_SESSION["senha"] = $item["usu_senha"];
                    $_SESSION["perm"] = $item["usu_perm"];
                }
                echo "<script> 
                    alert('Entrando!');
                    document.location.href='../../paginas/server.php';
                </script>";
                
            }else{
                $_SESSION["erro"] = 1;
                header("Location: ../../paginas/login.php");
            }

        }else{
            $_SESSION["erro"] = 2;
            header("Location: ../../paginas/login.php");
        }
    }

?>