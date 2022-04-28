<?php
    require_once "../assets/crudsystem.php"; // Chama a Class CRUD.
    session_start(); // Inicia a Sessão.

    /* Verifica se a Variavel 'Nome' e 'Senha' Está Setado Dentro da Sessão. */

    if(!isset($_SESSION["nome"]) && !isset($_SESSION["senha"])){
      header('Location: ../index.html'); // Se Não Estiver Setado Manda Para a Pagina Inicial.
    }

    /* Verifica se Tem Algo na Sessão com o Nome ERRO. */

    if(!empty($_SESSION["erro"])){
        $logica = $_SESSION["erro"]; // Seta a Variavel logica Com o Conteudo da Sessão ERRO.
    }

    /* Pega o ID passado pela pagina anterior e Cria o CRUD e Verifica Qual Usuario tem esse ID dentro do BD. */

    $PEGA_ID = $_GET["id"];
    $edituser = new CRUD;
    $edit = $edituser->VerificaUserID($PEGA_ID);

    /* Retira os Usuarios do Array por nome da tabela no BD. */

    if($edit){
        foreach($edit as $user){
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../CSS/cadastrar.css">
</head>
<body>
    <div class="container">
       <div class="box">
            <?php echo "<form action='../assets/validapaginas/editar_usuario.php?id=$PEGA_ID' method='POST' id='form'>"; // Quando for Submitado Ele manda para a pagina editar com o id do usuario
                    if($logica == 1){ // Se a Variavel 'logica' for 1 ele da o erro.
                            echo "<span class='erro'> Preencha Todos os Campos!</span>"; // Mensagem do Erro.
                            echo "<script src='../js/toggleerro.js'></script>"; // Script para dar Toggle na Mensagem (Não é necessario).
                            $_SESSION["erro"] = 0;
                        }
                 ?>
                <h2 id="cad">Edição de Usuario</h1>
                <label for="usertxt" class="labels">Nome de Usuario: </label>
                <input type="text" name="usertxt" id="user" placeholder="Nome Para Login" maxlength="30" autofocus value="<?php echo $user['usu_nome']; // Coloca o Texto do Input como o Nome Original do Usuario Selecionado na Pagina Anterior?>">
                <label for="useremail" class="labels">Email: </label>
                <input type="email" name="useremail" id="email" placeholder="exemplo@gmail.com" maxlength="50" value="<?php echo $user['usu_email']; // Coloca o Texto do Input como o Email Original do Usuario Selecionado na Pagina Anterior?>"> 
                <label for="passtxt" class="labels">Senha: </label>
                <input type="password" name="passtxt1" id="pass" placeholder="123" maxlength="16" value="<?php echo $user['usu_senha']; // Coloca o Texto do Input como a Senha Original do Usuario Selecionado na Pagina Anterior?>">
                <label for="repetepasstxt" class="labels">Repita a Senha: </label>
                <input type="password" name="passtxt2" id="passrepeat" placeholder="123" maxlength="16" value="<?php echo $user['usu_senha']; // Coloca o Texto do Input como a Senha Original do Usuario Selecionado na Pagina Anterior ?>">
                
                <select name="perm" id="seleciona">
                    <option value="0">Selecione a Permissão</option>
                    <?php
                        if($user['usu_perm'] == 1){ // Verifica a Perm e se Ela For 1 "ADMIN" ele coloca o Admin como SELECTED.
                    ?>
                            <option value="1" selected>Admin</option>
                            <option value="2">User</option>
                    <?php
                        }
                    ?>
                    <?php   
                        if($user['usu_perm'] == 2){ // Verifica a Perm e se Ela For 2 "USER" ele coloca a USER como SELECTED.
                    ?>
                            <option value="1">Admin</option>
                            <option value="2" selected>User</option>
                    <?php
                        }
                    ?>
                </select>

                <input type="submit" value="Cadastrar" id="btnCad" name="btnCadastro">

            </form>
    <?php 

        /* Fecha o IF e o FOREACH Para Conseguir Utilizar o FOREACH Dentro de Todo o Codigo  */

        }
    }
    
    ?>
        </div>
    </div>
</body>
</html>