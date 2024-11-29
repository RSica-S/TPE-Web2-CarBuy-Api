<?php

require_once 'model.php';

class CarModel extends Model {

    //Función que pide a la DB todas los autos
    public function getAutos(){
        $pdo = $this->crearConexion();
        $sql = "select * from autos order by id_auto ASC";
        $query = $pdo->prepare($sql);
        $query->execute();
    
        $autos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $autos;
    }
    
    public function getAutosOp($filtro=null, $sentido=null, $limite=null, $pagina){
        $pdo = $this->crearConexion();
        $sql = "SELECT * FROM autos";
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
            $autos = $query->fetchAll(PDO::FETCH_OBJ);
            return $autos;
        } 
        catch (\Throwable $th) {
            return null;
        }
    }

    //Función para crear un nuevo auto
    public function createAuto($nombre_auto, $descripcion, $precio, $id_marca){
        $pDO = $this->crearConexion();
        
        $sql = 'INSERT INTO autos (nombre_auto, descripcion, precio, id_marca_fk) 
                VALUES (?, ?, ?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$nombre_auto, $descripcion, $precio, $id_marca]);
            return $descripcion;
        } catch (\Throwable $th) {
            return null;
        }
    }

    //Elimina de la DB un auto con ese id
    public function deleteAuto($id){
        $pDO = $this->crearConexion();
    
        $sql = 'DELETE FROM autos
                WHERE id_auto = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    //Función que trae un auto por id
    public function getAuto($id){
        $pdo = $this->crearConexion();

        $sql = "SELECT * FROM autos
        WHERE id_auto = ?" ;
        $query = $pdo->prepare($sql);
        $query->execute([$id]);

        $auto = $query->fetch(PDO::FETCH_OBJ);

        return $auto;
    }

    //Modifica auto
    public function updateAuto($nombre_auto, $descripcion, $precio, $id_marca, $id){
        $pDO = $this->crearConexion();

        $sql = 'UPDATE autos 
            SET nombre_auto = ?, descripcion = ?, precio = ?, id_marca_fk = ?
            WHERE id_auto = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$nombre_auto, $descripcion, $precio, $id_marca, $id]);
            return $id;
        } catch (\Throwable $th) {
            return null;
        }
    }

}