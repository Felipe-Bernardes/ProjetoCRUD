<?php
        session_start();
        if(!empty($_SESSION["erro"])){
            $logica = $_SESSION["erro"];
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" href="../CSS/cadastrar.css">
</head>
<body>
    <div class="container">
       <div class="box">
             <form action="../assets/validapaginas/cadastra_finish.php" method="POST" id="form">
                <?php 
                    if($logica == 1){
                        echo "<span class='jacad'> Usuário Ja Cadastrado.</span>";
                        echo "<script src='../js/togglejacad.js'></script>";
                        $_SESSION["erro"] = 0;
                    }
                    if($logica == 2){
                        echo "<span class='erro'> Preencha Todos os Campos!</span>";
                        echo "<script src='../js/toggleerro.js'></script>";
                        $_SESSION["erro"] = 0;
                    }
                 ?>
                <h2 id="cad">Cadastro de Usuario</h1>
                <label for="usertxt" class="labels">Nome de Usuario: </label>
                <input type="text" name="usertxt" id="user" placeholder="Nome Para Login" maxlength="30" autofocus>
                <label for="useremail" class="labels">Email: </label>
                <input type="email" name="useremail" id="email" placeholder="exemplo@gmail.com" maxlength="50"> 
                <label for="passtxt" class="labels">Senha: </label>
                <input type="password" name="passtxt1" id="pass" placeholder="123" maxlength="16">
                <label for="repetepasstxt" class="labels">Repita a Senha: </label>
                <input type="password" name="passtxt2" id="passrepeat" placeholder="123" maxlength="16">
                <select name="perm" id="seleciona">
                    <option value="0" selected>Selecione a Permissão</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>

                <input type="submit" value="Cadastrar" id="btnCad" name="btnCadastro">
                
                <h4 class="loginfo">Já Tem Uma Conta? <a href="login.php" id="loginfo">Entrar</a></h3>

            </form>
        </div>
    </div>
</body>
</html>