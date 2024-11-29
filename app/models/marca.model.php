<?php

require_once 'model.php';

class MarcaModel extends Model {

    //Función que pide a la DB todas las marcas
    public function getMarcas(){
        $pdo = $this->crearConexion();
        $sql = "select * from marcas order by nombre_marca ASC";
        $query = $pdo->prepare($sql);
        $query->execute();
    
        $marcas = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $marcas;
    }

    public function getMarcasOp($filtro=null, $sentido=null, $limite=null, $pagina){
        $pdo = $this->crearConexion();
        $sql = "SELECT * FROM marcas";
        $offset = ($pagina -1) * $limite;
        if ($filtro){
            $sql .= " WHERE $filtro";}
        if($sentido){
            $sql.= " ORDER BY $sentido";}
        if($limite){
            $sql .= " LIMIT $limite OFFSET $offset";}
        $query = $pdo->prepare($sql);
        
        try {
            $query->execute();
            $marcas = $query->fetchAll(PDO::FETCH_OBJ);
            return $marcas;
        } 
        catch (\Throwable $th) {
            return null;
        }
    }

    //Función para crear una nueva marca
    public function createMarca($nombre_marca, $img){
        $pDO = $this->crearConexion();
        
        $sql = 'INSERT INTO marcas (nombre_marca, img_marca) 
                VALUES (?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$nombre_marca, $img]);
            return $nombre_marca;
        } catch (\Throwable $th) {
            return null;
        }
    }

    //Elimina de la DB una marca con ese id
    public function deleteMarca($id){
        $pDO = $this->crearConexion();
    
        $sql = 'DELETE FROM marcas
                WHERE id_marca = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    //Función que trae una marca por id
    public function getMarca($id){
        $pdo = $this->crearConexion();

        $sql = "SELECT * FROM marcas
        WHERE id_marca = ?" ;
        $query = $pdo->prepare($sql);
        $query->execute([$id]);

        $marca = $query->fetch(PDO::FETCH_OBJ);

        return $marca;
    }


    //Modifica marca
    public function updateMarca($nombre_marca, $img, $id){
        $pDO = $this->crearConexion();

        $sql = 'UPDATE marcas 
            SET nombre_marca = ?, img_marca = ?
            WHERE id_marca = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$nombre_marca, $img, $id]);
            return $id;
        } catch (\Throwable $th) {
            return null;
        }
    }
}