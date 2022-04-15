<?php
    session_start();
    require_once "../crudsystem.php";

    $btnLogin = addslashes($_POST["btnCadastro"]);
    $nome = addslashes($_POST["usertxt"]);
    $email = addslashes($_POST["useremail"]);
    $senha = addslashes($_POST["passtxt1"]);
    $repetesenha = addslashes($_POST["passtxt2"]);
    $perm = addslashes($_POST["perm"]);

    $_SESSION["erro"] = 0;
    
    $user = new CRUD;

    if($btnLogin){
        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($repetesenha) && !empty($perm) && $senha === $repetesenha && $perm != 0){
            $verifica = $user->VerificaUser($nome, $email);
                
            if($verifica){
                $_SESSION["erro"] = 1;
                header("Location: ../../paginas/cadastrar.php"); 
            }else{
                $user->AdicionarUser($nome, $senha, $email, $perm);
                echo "<script> 
                    alert('Usuario Cadastrado com Sucesso!');
                    document.location.href='../../index.html';
                </script>";
            }

        }else{
            $_SESSION["erro"] = 2;
            header("Location: ../../paginas/cadastrar.php");
        }
    }

?>