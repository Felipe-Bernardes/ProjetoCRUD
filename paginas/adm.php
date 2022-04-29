<?php
    require_once "../assets/crudsystem.php";
    
    if(!isset($_SESSION["nome"]) && !isset($_SESSION["senha"])){
        header('Location: ../index.html');
    }

    $users = new CRUD;
    $usuario = $users->FetchUsers();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link rel="stylesheet" href="../CSS/adm.css">
</head>
<body>
    <div class="container">
        <header class="topo">
            <a class="back" href="server.php">Voltar</a>
        </header>
        <section class="conteudo">
            <table class="tabela">
                <tr>
                    <th class="lista tamanho-1">IDs</th>
                    <th class="lista tamanho-1">Nomes</th>
                    <th class="lista tamanho-1">Senhas</th>
                    <th class="lista tamanho-1">Emails</th>
                    <th class="lista tamanho-1">Permissões</th>
                    <th class="lista tamanho-1">Edição</th>
                    <th class="lista tamanho-1">Exclusão</th>
                </tr>
                <?php
                    if($usuario){
                        foreach($usuario as $user){
                            echo "<tr>";
                            echo "<td class='lista tamanho-2'>".$user['usu_id']."</td>";
                            echo "<td class='lista tamanho-2'>".$user['usu_nome']."</td>";
                            echo "<td class='lista tamanho-2'>".$user['usu_senha']."</td>";
                            echo "<td class='lista tamanho-2'>".$user['usu_email']."</td>";
                            echo "<td class='lista tamanho-2'>".$user['usu_perm']."</td>";
                            echo "<td class='lista'><a class='link' href='editar.php?id=$user[usu_id]'>Editar</a></td>";
                            echo "<td class='lista'><a class='link' href='excluir.php?id=$user[usu_id]'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </section>
        <footer class="rodape">
            <p>Desenvolvido por: Felipe Bernardes</p>
        </footer>
    </div>
</body>
</html>