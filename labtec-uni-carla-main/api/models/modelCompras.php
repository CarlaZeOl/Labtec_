<?php
include_once 'api/config/config.php';
class modelCompras
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
 
    // Registrar Compras
    public function Register($data = [])
    {
        try {
            $fecha_compra = $data["fecha_compra"] ?? "";
            $folio_compra = $data["folio_compra"] ?? "";
            $condicion_pago = $data["condicion_pago"] ?? "";
            $cantidad =$data["cantidad"] ?? "";
            $codigo = $data["codigo"]?? "";
            $concepto = $data["codigo"] ?? "";
            $precio_unitario = $data["precio_unitario"] ?? "";
            $importe = $data["importe"] ?? "";
            $subtotal = $data["subtotal"] ?? "";
            $total_iva = $data["total_iva"] ?? "";
            $total = $data["total"] ?? "";
            $fecha_entrega_compras = $data["fecha_entrega_compras"] ?? "";
            $usuario_responsable = $data["usuario_responsable"] ?? "";
            $observaciones_compras = $data["observaciones_compras"] ?? "";
            $proveedor_fk = $data["proveedor_fk"] ?? "";
            $usuario_fk = $data["usuario_fk"] ?? "";
            

            $sql = "INSERT INTO compras (fecha_compra, folio_compra, condicion_pago, 
            cantidad, codigo, concepto, precio_unitario, importe, 
             subtotal, total_iva, total, fecha_entrega_compras, usuario_responsable, observaciones_compras, proveedor_fk, usuario_fk ) 
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $fecha_compra,
                        $folio_compra,
                        $condicion_pago,
                        $cantidad,
                        $codigo,
                        $concepto,
                        $precio_unitario,
                        $importe,
                        $subtotal,
                        $total_iva,
                        $total,
                        $fecha_entrega_compras,
                        $usuario_responsable,
                        $observaciones_compras,
                        $proveedor_fk,
                        $usuario_fk,
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }


    // ? Listar todas las compras
    public function List(){
        try {
            $sql = "SELECT * FROM compras";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar compras por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM compras WHERE id_compras = ?";            
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



    // ? Borrar compras por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM compras WHERE id_compras = ?";            
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
            $fecha_compra = $data["fecha_compra"] ?? "";
            $folio_compra = $data["folio_compra"] ?? "";
            $condicion_pago = $data["condicion_pago"] ?? "";
            $cantidad =$data["cantidad"] ?? "";
            $codigo = $data["codigo"]?? "";
            $concepto = $data["codigo"] ?? "";
            $precio_unitario = $data["precio_unitario"] ?? "";
            $importe = $data["importe"] ?? "";
            $subtotal = $data["subtotal"] ?? "";
            $total_iva = $data["total_iva"] ?? "";
            $total = $data["total"] ?? "";
            $fecha_entrega_compras = $data["fecha_entrega_compras"] ?? "";
            $usuario_responsable = $data["usuario_responsable"] ?? "";
            $observaciones_compras = $data["observaciones_compras"] ?? "";
            $proveedor_fk = $data["proveedor_fk"] ?? "";
            $usuario_fk = $data["usuario_fk"] ?? "";

            $sql = "UPDATE compras SET fecha_compra = ?,  folio_compra = ?,  condicion_pago = ?,   
            cantidad = ?, codigo = ?, concepto = ?, precio_unitario = ?, importe = ?,
            subtotal = ?,  total_iva = ?, total = ?, fecha_entrega_compras = ?, 
             usuario_responsable = ?, observaciones_compras = ?, proveedor_fk = ?, usuario_fk = ? WHERE id_compras = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $fecha_compra,
                    $folio_compra,
                    $condicion_pago,
                    $cantidad,
                    $codigo,
                    $concepto,
                    $precio_unitario,
                    $importe,
                    $subtotal,
                    $total_iva,
                    $total,
                    $fecha_entrega_compras,
                    $usuario_responsable,
                    $observaciones_compras,
                    $proveedor_fk,
                    $usuario_fk,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}

