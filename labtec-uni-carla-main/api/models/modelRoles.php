<?php
include_once 'api/config/config.php';
class modelRoles
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

    // Registrar roles
    public function Register($data = [])
    {
        try {
            
            $nombre = $data["nombre"] ?? "";
            

            $sql = "INSERT INTO roles ( nombre) VALUES (?)"; 
            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $nombre,
                        
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar todos los roles
    public function List(){
        try {
            $sql = "SELECT * FROM roles";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar roles por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM roles WHERE id_rol = ?";            
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



    // ? Borrar roles por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM roles WHERE id_rol = ?";            
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

    // ? Actualizar roles por ID
    public function UpdateById($data = []){
        try {
            $nombre = $data["nombre"] ?? "";
            

            $sql = "UPDATE roles SET nombre = ? WHERE id_rol = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                   $nombre,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
