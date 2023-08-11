<?php
include_once 'api/config/config.php';
class modelDireccion
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

    // Registrar Direccion
    public function Register($data = [])
    {
        try {
            $calle_uno = $data["calle_uno"] ?? "";
            $calle_dos = $data["calle_dos"] ?? "";
            $provincia = $data["provincia"] ?? "";
            $ciudad = $data["ciudad"] ?? "";
            $pais = $data["pais"] ?? "";
            $codigo_postal= $data["codigo_postal"] ?? "";


            $sql = "INSERT INTO direccion (calle_uno, calle_dos, provincia, ciudad, pais, codigo_postal) VALUES (?, ?, ?, ?, ?, ?)";

            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $calle_uno,
                        $calle_dos,
                        $provincia,
                        $ciudad,
                        $pais,
                        $codigo_postal,
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }


    // ? Listar todas las direcciones
    public function List(){
        try {
            $sql = "SELECT * FROM direccion";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar direcciones por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM direccion WHERE id_direccion = ?";            
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



    // ? Borrar direcciones por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM direccion WHERE id_direccion = ?";            
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

    // ? Actualizar direcciones por ID
    public function UpdateById($data = []){
        try {
            $calle_uno = $data["calle_uno"] ?? "";
            $calle_dos = $data["calle_dos"] ?? "";
            $provincia = $data["provincia"] ?? "";
            $ciudad = $data["ciudad"] ?? "";
            $pais = $data["pais"] ?? "";
            $codigo_postal= $data["codigo_postal"] ?? "";

            $sql = "UPDATE direccion SET calle_uno = ?, calle_dos = ?, provincia = ?, ciudad = ?, pais = ?, codigo_postal = ? WHERE id_direccion = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                   $calle_uno,
                   $calle_dos,
                   $provincia,
                   $ciudad,
                   $pais,
                   $codigo_postal,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}

