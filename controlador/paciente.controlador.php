<?php 
require '../modelo/paciente.modelo/php';

if($_POST){
    $paciente = new Paciente();

    switch($_POST["accion"]){
        
        case "CONSULTAR":
            echo json_encode($paciente->ConsultarTodo());
            break;
        case "CONSULTAR_ID":
            echo json_encode($paciente->consultarPorId("idPaciente"));

            break;
        case "GUARDAR":
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $cedula = $_POST["cedula"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $sexo = $_POST["sexo"];
            $nacimiento = $_POST["nacimiento"];
            $fecha_creacion = $_POST["fecha_creacion"];
            $respuesta = $paciente->Guardar($nombre,$apellidos,$cedula,$telefono,$direccion,$sexo,$nacimiento,$fecha_creacion);
            echo json_encode($respuesta);
            break;
        case "MODIFICAR":
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $cedula = $_POST["cedula"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $sexo = $_POST["sexo"];
            $nacimiento = $_POST["nacimiento"];
            $fecha_creacion = $_POST["fecha_creacion"];
            $respuesta = $paciente->Modificar($nombre,$apellidos,$cedula,$telefono,$direccion,$sexo,$nacimiento,$fecha_creacion);
            echo json_encode($respuesta);
            break;
        case "ELIMINAR":
            $idPaciente = $_POST["idPaciente"];
            $respuesta = $paciente->Eliminar($idPaciente);
            echo json_encode($respuesta);
            break;

    }
}
?>