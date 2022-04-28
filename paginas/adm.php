<?php
    session_start();

    if(!isset($_SESSION["nome"]) && !isset($_SESSION["senha"])){
        header('Location: ../index.html');
    }

    require_once "../assets/crudsystem.php";
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
        <section class="conteudo">
            <table class="tabela" border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Email</th>
                    <th>Permissão</th>
                    <th>Edição</th>
                    <th>Exclusão</th>
                </tr>
                <?php
                    if($usuario){
                        foreach($usuario as $user){
                            echo "<tr>";
                            echo "<td>". $user['usu_id']."</td>";
                            echo "<td>".$user['usu_nome']."</td>";
                            echo "<td>".$user['usu_senha']."</td>";
                            echo "<td>".$user['usu_email']."</td>";
                            echo "<td>".$user['usu_perm']."</td>";
                            echo "<td><a href='editar.php?id=$user[usu_id]'>Editar</a></td>";
                            echo "<td><a href='excluir.php?id=$user[usu_id]'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </section>
    </div>
</body>
</html>