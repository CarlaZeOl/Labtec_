<?php
include_once 'api/config/config.php';
class modelComp_Prov
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

    // ? Registrar compras_proveedores
    public function Register($data = [])
    {
        try {
            $cantidad = $data["cantidad"] ?? "";
            $codigo = $data["codigo"] ?? "";
            $concepto = $data["concepto"] ?? "";
            $precio_unitario = $data["precio_unitario"] ?? "";
            $importe = $data["importe"] ?? "";
            $compras_fk = $data["compras_fk"] ?? "";
            $proveedor_fk = $data["proveedor_fk"] ?? "";
            $producto_fk = $data["producto_fk"] ?? "";


            $sql = "INSERT INTO compras_proveedores (cantidad, codigo, concepto, precio_unitario, importe, compras_fk, proveedor_fk, producto_fk) VALUES (?, ?, ?, ?, ?, ?, ? ,?)"; 
            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(          
                         $cantidad,
                         $codigo,
                         $concepto,
                         $precio_unitario,
                         $importe,
                         $compras_fk ,
                         $proveedor_fk,
                         $producto_fk,
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar todos los compras_proveedores
    public function List(){
        try {
            $sql = "SELECT * FROM compras_proveedores";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar compras_proveedores por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM compras_proveedores WHERE id_comp_prov = ?";            
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

    // ? Listar compras_proveedores por codigo
    public function ListByUser($user = ""){
        try {
            $sql = "SELECT * FROM compras_proveedores WHERE codigo = ?";            
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

    // ? Borrar compras_proveedores por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM compras_proveedores WHERE id_comp_prov = ?";            
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

    // ? Actualizar compras_proveedores por ID
    public function UpdateById($data = []){
        try {
            $cantidad = $data["cantidad"] ?? "";
            $codigo = $data["codigo"] ?? "";
            $concepto = $data["concepto"] ?? "";
            $precio_unitario = $data["precio_unitario"] ?? "";
            $importe = $data["importe"] ?? "";
            $compras_fk = $data["compras_fk"] ?? "";
            $proveedor_fk = $data["proveedor_fk"] ?? "";
            $producto_fk = $data["producto_fk"] ?? "";

            $sql = "UPDATE compras_proveedores SET cantidad = ?, codigo = ?, concepto = ?, precio_unitario = ?, importe = ?, importe = ?, compras_fk =?
            proveedor_fk = ?, producto_fk =? WHERE id_comp_prov = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $cantidad,
                    $codigo,
                    $concepto,
                    $precio_unitario,
                    $importe,
                    $compras_fk ,
                    $proveedor_fk,
                    $producto_fk,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
