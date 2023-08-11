<?php
include_once 'api/config/config.php';
class modelPedi_Prod
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
            $pruebas = $data["pruebas"] ?? "";
            $existencia = $data["existencia"] ?? "";
            $cantidad_requerida = $data["cantidad_requerida"] ?? "12345";
            $urgencia = $data["urgencia"] ?? "";
            $surtido = $data["surtido"] ?? "";
            $producto_pedido = $data["producto_pedido"] ?? "";
            $id_rol_for = $data["id_rol_for"] ?? "";
            $pedido_fk = $data["pedido_fk"] ?? "";


            $sql = "INSERT INTO pedido_productos (pruebas, existencia, cantidad_requerida, urgencia, surtido, producto_pedido, id_rol_for, pedido_fk) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 
            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $pruebas,
                        $existencia,
                        $cantidad_requerida,
                        $urgencia,
                        $surtido,
                        $producto_pedido,
                        $id_rol_for,
                        $pedido_fk,
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar todos los pedido_productos
    public function List(){
        try {
            $sql = "SELECT * FROM pedido_productos";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar pedido_productos por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM pedido_productos WHERE id_com_prod = ?";            
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

    // ? Listar pedido_productos por urgencia
    public function ListByUser($user = ""){
        try {
            $sql = "SELECT * FROM pedido_productos WHERE urgencia = ?";            
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

    // ? Borrar pedido_productos por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM pedido_productos WHERE id_com_prod = ?";            
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

    // ? Actualizar pedido_productos por ID
    public function UpdateById($data = []){
        try {
            $pruebas = $data["pruebas"] ?? "";
            $existencia = $data["existencia"] ?? "";
            $cantidad_requerida = $data["cantidad_requerida"] ?? "12345";
            $urgencia = $data["urgencia"] ?? "";
            $surtido = $data["surtido"] ?? "";
            $producto_pedido = $data["producto_pedido"] ?? "";
            $id_rol_for = $data["id_rol_for"] ?? "";
            $pedido_fk = $data["pedido_fk"] ?? "";

            $sql = "UPDATE pedido_productos SET pruebas = ?, existencia = ?, cantidad_requerida = ?, urgencia = ?, surtido = ?, producto_pedido = ?, id_rol_for = ?, pedido = ? WHERE id_comp_prod = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $pruebas,
                    $existencia,
                    $cantidad_requerida,
                    $urgencia,
                    $surtido,
                    $producto_pedido,
                    $id_rol_for,
                    $pedido_fk,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
