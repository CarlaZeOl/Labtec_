<?php
include_once 'api/config/config.php';
class modelPedido
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
// Registrar pedidos
    public function Register($data = [])
    {
        try {
            $referencia_numero = $data["referencia_numero"] ?? "";
            $sucursal = $data["sucursal"] ?? "";
            $fecha_pedido = $data["fecha_pedido"] ?? "";
            $pruebas = $data["pruebas"] ?? "";
            $existencia = $data["existencia"] ?? "";
            $cantidad_requerida = $data["cantidad_requerida"] ?? "";
            $urgencia = $data["uregencia"] ?? "";
            $surtido = $data["surtido"] ?? "";
            $observaciones_pedido = $data["observaciones_pedido"] ?? "";
            $fecha_entrega_pedido = $data["fecha_entrega_pedido"] ?? "";
            $producto_pedido = $data["producto_pedido"] ?? "";
            $usuario_pedido = $data["usuario_pedido"] ?? "";
            $producto_fk = $data["producto_fk"] ?? "";
            $usuario_fk = $data["usuario_fk"] ?? "";
            
            $sql = "INSERT INTO pedido (referencia_numero, sucursal, fecha_pedido,
            pruebas, existencia, cantidad_requerida, urgencia, surtido, observaciones_pedido,
             fecha_entrega_pedido, producto_pedido, usuario_pedido, producto_fk, usuario_fk ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $referencia_numero,
                        $sucursal,
                        $fecha_pedido,
                        $pruebas,
                        $existencia,
                        $cantidad_requerida,
                        $urgencia, 
                        $surtido,
                        $observaciones_pedido,
                        $fecha_entrega_pedido,
                        $producto_pedido,
                        $usuario_pedido,
                        $producto_fk,
                        $usuario_fk,
            
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }


    // ? Listar todos los pedidos
    public function List(){
        try {
            $sql = "SELECT * FROM pedido";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar pedidos por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM pedido WHERE id_pedido = ?";            
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

    // ? Listar pedidos por pedido
    public function ListByUser($user = ""){
        try {
            $sql = "SELECT * FROM pedido WHERE pedido = ?";            
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

    // ? Borrar pedidos por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM pedido WHERE id_pedido = ?";            
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

    // ? Actualizar pedidos por ID
    public function UpdateById($data = []){
        try {
            $referencia_numero = $data["referencia_numero"] ?? "";
            $sucursal = $data["sucursal"] ?? "";
            $fecha_pedido = $data["fecha_pedido"] ?? "";
            $pruebas = $data["pruebas"] ?? "";
            $existencia = $data["existencia"] ?? "";
            $cantidad_requerida = $data["cantidad_requerida"] ?? "";
            $urgencia = $data["uregencia"] ?? "";
            $surtido = $data["surtido"] ?? "";
            $observaciones_pedido = $data["observaciones_pedido"] ?? "";
            $fecha_entrega_pedido = $data["fecha_entrega_pedido"] ?? "";
            $producto_pedido = $data["producto_pedido"] ?? "";
            $usuario_pedido = $data["usuario_pedido"] ?? "";
            $producto_fk = $data["producto_fk"] ?? "";
            $usuario_fk = $data["usuario_fk"] ?? "";

            $sql = "UPDATE pedido SET referencia_numero = ?, sucursal = ?, fecha_pedido = ?, 
             pruebas = ?, existencia = ?, cantidad_requerida =?, urgencia = ?, surtido =?, observaciones_pedido = ?, 
            fecha_entrega_pedido = ?, producto_pedido = ?, usuario_pedido = ?, producto_fk = ?, usuario_fk = ? WHERE id_usuario = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $referencia_numero,
                    $sucursal,
                    $fecha_pedido,
                    $pruebas,
                    $existencia,
                    $cantidad_requerida,
                    $urgencia, 
                    $surtido,
                    $observaciones_pedido,
                    $fecha_entrega_pedido,
                    $producto_pedido,
                    $usuario_pedido,
                    $producto_fk,
                    $usuario_fk,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}

