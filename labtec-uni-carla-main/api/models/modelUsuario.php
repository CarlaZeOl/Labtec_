<?php
include_once 'api/config/config.php';
class modelUsuario
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ? Registrar usuarios
    public function Register($data = [])
    {
        try {
            $usuario = $data["usuario"] ?? "";
            $nombre = $data["nombre"] ?? "";
            $password = $data["password"] ?? "12345";
            $id_rol_for = $data["id_rol_for"] ?? "";

            $sql = "INSERT INTO usuario (usuario, nombre, password, id_rol_for) VALUES (?, ?, ?, ?)"; 
            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $usuario,
                        $nombre,
                        $password,
                        $id_rol_for,
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar todos los usuarios
    public function List(){
        try {
            $sql = "SELECT * FROM usuario";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar usuarios por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM usuario WHERE id_usuario = ?";            
            $result = $this->pdo->prepare($sql);
            $result->execute(
                array(
                    $id
                )
            );
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar usuarios por usuario
    public function ListByUser($user = ""){
        try {
            $sql = "SELECT * FROM usuario WHERE usuario = ?";            
            $result = $this->pdo->prepare($sql);
            $result->execute(
                array(
                    $user
                )
            );
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Borrar usuarios por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM usuario WHERE id_usuario = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $id
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Actualizar usuarios por ID
    public function UpdateById($data = []){
        try {
            $usuario = $data["usuario"] ?? "";
            $password = $data["password"] ?? "12345";
            $id_usuario = $data["id_usuario"] ?? "";
            $id_rol_for = $data["id_rol_for"] ?? "";

            $sql = "UPDATE usuario SET usuario = ?, password = ?, id_rol_for = ? WHERE id_usuario = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $usuario,
                    $password,
                    $id_usuario,
                    $id_rol_for,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
