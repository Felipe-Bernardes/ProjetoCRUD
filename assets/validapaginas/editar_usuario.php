<?php
    require_once "../crudsystem.php";

    $PEGA_ID = $_GET['id'];

    $btnLogin = addslashes($_POST["btnCadastro"]);
    $nome = addslashes($_POST["usertxt"]);
    $email = addslashes($_POST["useremail"]);
    $senha = addslashes($_POST["passtxt1"]);
    $repetesenha = addslashes($_POST["passtxt2"]);
    $perm = addslashes($_POST["perm"]);

    $permissao = intval($perm);

    $_SESSION["erro"] = 0;

    $Editar = new CRUD;
    if($btnLogin){
        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($repetesenha) && !empty($perm) && $senha === $repetesenha && $permissao != 0){
            $verifica = $Editar->VerificaUserEdit($nome, $email);
            if($verifica){
                echo "
                <script>
                        alert('O Nome e o Email não Foram Alterados!')
                        document.location.href='../../paginas/adm.php'
                </script>
                ";
            }else{
                $resultado = $Editar->EditarUser($PEGA_ID, $nome, $senha, $email);
                echo "
                    <script>
                        alert('Atualizado com Sucesso')
                        document.location.href='../../paginas/adm.php'
                    </script>
                ";    
            }
        }else{
            $_SESSION["erro"] = 2;
            header("Location: ../../paginas/editar.php?id=". $PEGA_ID);
        }
    }
?>