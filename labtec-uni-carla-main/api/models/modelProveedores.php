<?php
include_once 'api/config/config.php';
class modelProveedores
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
    
    // Registrar proveedores
    public function Register($data = [])
    {
        try {
            $empresa = $data["empresa"] ?? "";
            $imagen_proveedor = $data["imagen_proveedor"] ?? "";
            $rfc = $data["rfc"] ?? "";
            $telefono = $data["telefono"] ?? "";
            $celular = $data["celular"] ?? "";
            $tipo = $data["tipo"] ?? "";
            $correo = $data["correo"] ?? "";
            $sitio_web = $data["sitio_web"] ?? "";
            $categoria = $data["categoria"] ?? "";
            $direccion_fk = $data["direccion_fk"] ?? "";


            $sql = "INSERT INTO proveedores (empresa, imagen_proveedor, 
            rfc, telefono, celular, tipo, correo, sitio_web, categoria, direccion_fk)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $empresa,
                        $imagen_proveedor,
                        $rfc,
                        $telefono,
                        $celular,
                        $tipo,
                        $correo,
                        $sitio_web,
                        $categoria,
                        $direccion_fk,
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }

    
    // ? Listar todos los proveedores
    public function List(){
        try {
            $sql = "SELECT * FROM proveedores";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar proveedores por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM proveedores WHERE id_proveedor = ?";            
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

    // ? Listar proveedores por empresa
    public function ListByUser($user = ""){
        try {
            $sql = "SELECT * FROM proveedores WHERE empresa = ?";            
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

    // ? Borrar proveedores por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM proveedores WHERE id_proveedor = ?";            
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

    // ? Actualizar proveedores por ID
    public function UpdateById($data = []){
        try {
            $empresa = $data["empresa"] ?? "";
            $imagen_proveedor = $data["imagen_proveedor"] ?? "";
            $rfc = $data["rfc"] ?? "";
            $telefono = $data["telefono"] ?? "";
            $celular = $data["celular"] ?? "";
            $tipo = $data["tipo"] ?? "";
            $correo = $data["correo"] ?? "";
            $sitio_web = $data["sitio_web"] ?? "";
            $categoria = $data["categoria"] ?? "";
            $direccion_fk = $data["direccion_fk"] ?? "";

            $sql = "UPDATE proveedores SET empresa = ?, imagen_proveedor = ?, rfc = ?,
            telefono = ?, celular = ?, tipo = ?, correo = ?, sitio_web = ?, categoria = ?, direccion_fk = ? WHERE id_proveedor = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $empresa,
                    $imagen_proveedor,
                    $rfc,
                    $telefono,
                    $celular,
                    $tipo,
                    $correo,
                    $sitio_web,
                    $categoria,
                    $direccion_fk,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
