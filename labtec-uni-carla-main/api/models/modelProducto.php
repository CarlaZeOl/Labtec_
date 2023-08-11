<?php
include_once 'api/config/config.php';
class modelProducto
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
// Registrar productos
    public function Register($data = [])
    {
        try {
            $clave_producto = $data["clave_producto"] ?? "";
            $nombre_producto = $data["nombre_producto"] ?? "";
            $descripcion = $data["descripcion"] ?? "";
            $imagen_producto = $data["imagen_producto"] ?? "";
            $categoria_producto = $data["categoria_producto"] ?? "";
            $codigo_barras = $data["codigo_barras"] ?? "";
            $capacidad = $data["capacidad"] ?? "";
            $cantidad = $data["cantidad"] ?? "";
            $tipo_envase = $data["tipo_envase"] ?? "";
            $fecha_ingreso = $data["fecha_ingreso"] ?? "";
            $fecha_caducidad = $data["fecha_caducidad"] ?? "";
            $observaciones_producto = $data["observaciones_producto"] ?? "";

            
            $sql = "INSERT INTO producto (clave_producto, nombre_producto, descripcion, imagen_producto,
            categoria_producto, codigo_barras, capacidad, cantidad, tipo_envase, fecha_ingreso,
            fecha_caducidad, observaciones_producto)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            
            $status = $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $clave_producto,
                        $nombre_producto,
                        $descripcion,
                        $imagen_producto,
                        $categoria_producto,
                        $codigo_barras,
                        $capacidad,
                        $cantidad,
                        $tipo_envase,
                        $fecha_ingreso,
                        $fecha_caducidad,
                        $observaciones_producto,
            
                    )
                );
            return $status;
        } catch (Exception $e) {
            return false;
        }
    }


    // ? Listar todos los productos
    public function List(){
        try {
            $sql = "SELECT * FROM producto";            
            $result = $this->pdo->prepare($sql);
            $result->execute();
            $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return false;
        }
    }

    // ? Listar productos por ID
    public function ListById($id = ""){
        try {
            $sql = "SELECT * FROM producto WHERE id_producto = ?";            
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



    // ? Borrar productos por ID
    public function DeleteById($id = ""){
        try {
            $sql = "DELETE FROM producto WHERE id_producto = ?";            
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

    // ? Actualizar productos por ID
    public function UpdateById($data = []){
        try {
            $clave_producto = $data["clave_producto"] ?? "";
            $nombre_producto = $data["nombre_producto"] ?? "";
            $descripcion = $data["descripcion"] ?? "";
            $imagen_producto = $data["imagen_producto"] ?? "";
            $categoria_producto = $data["categoria_producto"] ?? "";
            $codigo_barras = $data["codigo_barras"] ?? "";
            $capacidad = $data["capacidad"] ?? "";
            $cantidad = $data["cantidad"] ?? "";
            $tipo_envase = $data["tipo_envase"] ?? "";
            $fecha_ingreso = $data["fecha_ingreso"] ?? "";
            $fecha_caducidad = $data["fecha_caducidad"] ?? "";
            $observaciones_producto = $data["observaciones_producto"] ?? "";
            

            $sql = "UPDATE producto SET clave_producto = ?, nombre_producto = ?, descripcion = ?, imagen_producto = ?, categoria_producto = ?,
            codigo_barras = ?, capacidad = ?, cantidad = ?, tipo_envase = ?, fecha_ingreso = ?, fecha_caducidad = ?, observaciones_producto =? WHERE id_producto = ?";            
            $result = $this->pdo->prepare($sql)->execute(
                array(
                    $clave_producto,
                    $nombre_producto,
                    $descripcion,
                    $imagen_producto,
                    $categoria_producto,
                    $codigo_barras,
                    $capacidad,
                    $cantidad,
                    $tipo_envase,
                    $fecha_ingreso,
                    $fecha_caducidad,
                    $observaciones_producto,
                )
            );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
 