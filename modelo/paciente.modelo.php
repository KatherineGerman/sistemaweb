<?php 

require 'conexion.php';

class Persona{

    public function consultarTodo(){
        $conexion = new Conexion();
        $stmt = $conexion->prepare("SELECT * FROM paciente");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    public function consultarPorId($idPaciente){

        $conexion = new Conexion();
        $stmt = $conexion->prepare("SELECT * FROM paciente where idPaciente = idPaciente");
        $stmt->bindValue(":idPaciente, $idPaciente, PDO:PARAM_INT");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function Guardar($cedula, $nombre, $apellido, $telefono, $direccion, $sexo, $nacimiento, $fecha_creacion){
        $conexion = new Conexion();
        $stmt = $conexion->prepare("INSERT INTO `paciente`( `nombre`, `apellidos`, `cedula`, `telefono`, `direccion`, `sexo`, `nacimiento`, `fecha_creacion`)
         VALUES (:nombre, :apellidos,:cedula,:telefono,:direccion,:sexo,:nacimiento,:fecha_creacion,);");

         $stmt->bindValue(":nombre, $nombre, PDO:PARAM_STR");
         $stmt->bindValue(":apellidos, $apellidos, PDO:PARAM_STR");
         $stmt->bindValue(":cedula, $cedula, PDO:PARAM_STR");
         $stmt->bindValue(":telefono, $telefono, PDO:PARAM_STR");
         $stmt->bindValue(":direccion, $direccion, PDO:PARAM_STR");
         $stmt->bindValue(":sexo, $sexo, PDO:PARAM_STR");
         $stmt->bindValue(":nacimiento, $nacimiento, PDO:PARAM_STR");
         $stmt->bindValue(":fecha_creacion, $fecha_creacion, PDO:PARAM_STR");


         if($stmt->execute()){
             return "OK";
         }else{
             return "ERROR: Se ha generado un error al guardar la informacion";
         }
    }

    public function Modificar($idPaciente, $cedula, $nombre, $apellido, $telefono, $direccion, $sexo, $nacimiento, $fecha_creacion){
        $conexion = new Conexion();
        $stmt = $conexion->prepare("UPDATE `paciente` 
        SET `nombre`= :nombre,`apellidos`= :apellidos,`cedula`=:cedula,`telefono`=:telefono,`direccion`=:direccion,`sexo`=:sexo,`nacimiento`=:nacimiento,`fecha_creacion`=:fecha_creacion WHERE `idPersona` = :id;");

         $stmt->bindValue(":nombre, $nombre, PDO:PARAM_STR");
         $stmt->bindValue(":apellidos, $apellidos, PDO:PARAM_STR");
         $stmt->bindValue(":cedula, $cedula, PDO:PARAM_STR");
         $stmt->bindValue(":telefono, $telefono, PDO:PARAM_STR");
         $stmt->bindValue(":direccion, $direccion, PDO:PARAM_STR");
         $stmt->bindValue(":sexo, $sexo, PDO:PARAM_STR");
         $stmt->bindValue(":nacimiento, $nacimiento, PDO:PARAM_STR");
         $stmt->bindValue(":fecha_creacion, $fecha_creacion, PDO:PARAM_STR");
         $stmt->bindValue(":idPaciente, $idPaciente, PDO:PARAM_INT");


         if($stmt->execute()){
             return "OK";
         }else{
             return "ERROR: Se ha generado un error al modificar la informacion";
         }
    }

    public function Eliminar($idPaciente, $cedula, $nombre, $apellido, $telefono, $direccion, $sexo, $nacimiento, $fecha_creacion){
        $conexion = new Conexion();
        $stmt = $conexion->prepare("DELETE FROM paciente 
                WHERE idPaciente=idPaciente");

         $stmt->bindValue(":idPaciente, $idPaciente, PDO:PARAM_INT");


         if($stmt->execute()){
             return "OK";
         }else{
             return "ERROR: Se ha generado un error al eliminar la informacion";
         }
    }
}
?>