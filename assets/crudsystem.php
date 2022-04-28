<?php
    require_once "conexao.php";
    session_start();

    class CRUD{

        public function AdicionarUser($nome, $senha, $email, $perm){
            try{
            global $con;
                $add = $con->prepare('INSERT INTO usuarios(usu_nome, usu_senha, usu_email, usu_perm) VALUES (?, ?, ?, ?)');
                $add->bindParam(1, $nome);
                $add->bindParam(2, $senha);
                $add->bindParam(3, $email);
                $add->bindParam(4, $perm);
                $add->execute();
            } catch(PDOException $e){
                echo "Erro: ". $e->getMessage();
            }
        }

        public function EditarUser($id, $nome, $senha, $email, $perm){

            try{
            global $con;
                $edit = $con->prepare("UPDATE usuarios SET usu_nome = ?, usu_senha = ?, usu_email = ?, usu_perm = ? WHERE usu_id = ? ");
                $edit->bindParam(1, $nome);
                $edit->bindParam(2, $senha);
                $edit->bindParam(3, $email);
                $edit->bindParam(4, $perm);
                $edit->bindParam(5, $id);
                $edit->execute();
            } catch(PDOException $e){
                echo "Erro: ". $e->getMessage();
            }
        }

        public function DeletarUser($id){
            try{
            global $con;
                $del = $con->prepare('DELETE FROM usuarios WHERE usu_id = ?');
                $del->bindParam(1, $id);
                $del->execute();
            }catch(PDOException $e){
                echo "Erro: ". $e->getMessage();
            }
        }

        public function EntrarUser($nome, $senha){
            try{
            global $con;
                $sel = $con->prepare('SELECT * FROM usuarios WHERE usu_nome = ? AND usu_senha = ?');
                $sel->bindParam(1, $nome);
                $sel->bindParam(2, $senha);
                $sel->execute();
                
                if($sel->rowCount() > 0){
                    $resultado = $sel->fetchAll();
                    return $resultado;
                }else{
                    echo "Erro ao Selecionar Usuario";
                }
            }catch(PDOException $e){
                echo "Erro: ". $e->getMessage();
            }
        }

        public function VerificaUser($nome, $email){
            try{
                global $con;
                    $sql = $con->prepare('SELECT * FROM usuarios WHERE usu_nome = ? OR usu_email = ?');
                    $sql->bindParam(1, $nome);
                    $sql->bindParam(2, $email);
                    $sql->execute();

                if($sql->rowCount() > 0){
                    $result = $sql->fetchAll();
                    return $result;
                }else{
                    echo "Erro ao Selecionar os Usuarios!";
                }
            }catch(PDOException $e){
                echo "Erro: ". $e->getMessage();
            }
        }
        
        public function VerificaUserID($id){
            try{
                global $con;

                $sql = $con->prepare('SELECT * FROM usuarios WHERE usu_id = ?');
                $sql->bindParam(1, $id);
                $sql->execute();

                if($sql->rowCount() > 0){
                    $result = $sql->fetchAll();
                    return $result;
                }else{
                    echo "Erro ao Selecionar Usuario";
                }
            }catch(PDOException $e){
                echo "Erro: ". $e->getMessage();
            }
        }

        public function FetchUsers(){
            try{
                global $con;
                    $sql = $con->query('SELECT * FROM usuarios');

                    if($sql->rowCount() > 0){
                        $result = $sql->fetchAll();
                        return $result;
                    }else{
                        echo "Erro ao Selecionar Usuarios!";
                    }
            }catch(PDOException $e){
                echo "Erro: ". $e->getMessage();
            }
        }

    }
?>