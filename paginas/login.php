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
    <title>Login de Usuario</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="container">
        <div class="box">
           <form method="POST" action="../assets/validapaginas/login_finish.php" id="form">
                <?php
                    if($logica == 1){
                        echo "<span class='jacad'> Usuário não encontrado.</span>";
                        echo "<script src='../js/togglejacad.js'></script>";
                        $_SESSION["erro"] = 0;
                    }

                    if($logica == 2){
                        echo "<span class='erro'>Preencha Todos os Campos!</span>";
                        echo "<script src='../js/toggleerro.js'></script>";
                        $_SESSION["erro"] = 0;
                     }
                ?>
               <h2 class="log">Área de Login</h2>
               <label for="usertxt" class="labels">Nome do Usuário: </label>
               <input type="text" name="usertxt" id="user" placeholder="Usuário" maxlength="30">
               <label for="passtxt" class="labels">Senha: </label>
               <input type="password" name="passtxt" id="pass" placeholder="123456789" maxlength="16">

               <input type="submit" value="Login" id="btnLog" name="btnLogin">

               <h4 class="cadinfo">Não é Cadastrado? <a href="cadastrar.php" id="cadinfo">Cadastre-se</a></h3>
           </form>
        </div>
    </div>
</body>
</html>