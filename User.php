<?php
require('./ConnectionDB.php');
class User {

    public object $conn;

    public function __construct()
    {
        $conna = new ConnectionDB();
        $this->conn = $conna->getConnection();
    }

    public function addUser($nome,$email) : string{
        try{
            $query = "INSERT INTO teste.usuarios(nome,email) VALUES (:nome, :email)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':nome'=> $nome,
                ':email'=> $email
            ]);
            return "Usuário Cadastrado com Sucesso";
        }catch(Exception $err){
            return "Erro ao Cadastrar Usuário" . $err->getMessage();
        }
      
        
    }   


    public function getUsers() : array{
        $query = "SELECT * FROM teste.usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }   

    public function deleteUser($id) : string {
        try{
            $query = "DELETE FROM teste.usuarios WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id'=>$id
        ]);
        return "Usuário Excluido";
        }catch(Exception $err){
            return "Erro ao Excluir Usuário" . $err->getMessage();
        }
    }  

    public function updateUser($id,$nome,$email) : string {
        try{
            $query = "UPDATE teste.usuarios SET nome=:nome, email=:email WHERE id=:id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
            ':id'=>$id,
            'nome'=>$nome,
            'email'=>$email
        ]);
        return "Usuário Editado";
        }catch(Exception $err){
            return "Erro ao Editar Usuário" . $err->getMessage();
        }
    }  
}