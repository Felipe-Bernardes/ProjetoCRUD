<?php
    session_start();

    if(!isset($_SESSION["nome"]) && !isset($_SESSION["senha"])){
        header('Location: ../index.html');
    }

    if(isset($_SESSION["perm"])){
        $permissao = $_SESSION["perm"];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servidor Geral</title>
    <link rel="stylesheet" href="../CSS/server.css">
</head>
<body>
    <header id="header">
        <ul class="nav">
            <li><a class="nav-links" href="perfil.php">Meu Perfil</a></li>
            <?php if($permissao == 1){ ?>
            <li><a class="nav-links" href="adm.php">Área Administrativa</a></li>
            <?php } ?>
        </ul>
        <div class="btn-sair">
            <a id="sair" href="sair.php">Sair</a>
        </div>
    </header>

    <main id="main">
        <table class="tabela" >
            <tr>
                <th class="ths-tds adm" colspan="2">Administração do CRUD</th>
            </tr>
            <tr>
                <th class="ths-tds fin" colspan="2">Principais Funcinalidades Desta Sessão</th>
            </tr>
            <tr>
                <th class="ths-tds">Meu Perfil</th>
                <td class="ths-tds">Nesta sessão você poderá fazer mudanças em seu nome, email e senha, deixando-os do jeito que você desejar!</td>
            </tr>
            <tr>
                <th class="ths-tds">Área Administrativa</th>
                <td class="ths-tds">Está sessão aparece para os Administradores e nela, eles conseguem alterar dados de usuários e deleta-los sucessivamente.</td>
            </tr>
            <tr>
                <th class="ths-tds">Botão Sair</th>
                <td class="ths-tds">Ele te redireciona para a pagina Principal e te desloga do Site!</td>
            </tr>
            <tr>
                <th class="ths-tds fin" colspan="2">Tenha Uma Boa Administração</td>
            </tr>
        </table>
    </main>

    <footer id="footer">
        <p>Desenvolvido por: Felipe Bernardes</p>
    </footer>
</body>
</html>