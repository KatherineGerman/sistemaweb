
var url = "./../controlador/persona.controlador.php"
function Consultar(){

    $.ajax({
        url: url,
        data: {"accion": "CONSULTAR"},
        type: 'POST',
        dataType: 'json'

    }).done(function(response){
        var html = "";
        $.each(response, function(index, data){
            html += "<tr>"
            html += "<td>"+data.nombre+"</td>"
            html += "<td>"+data.apellidos+"</td>"
            html += "<td>"+data.cedula+"</td>"
            html += "<td>"+data.fecha_creacion+"</td>"
            html += "<td>"
            html += "<button class='btn-warning' onclick='ConsultarPorId("+ data.idPersona +");'><span class='fa fa-edit'></span> Modificar</button> "
            html += "<button class='btn-danger' onclick='Eliminar("+ data.idPersona +");'><span class='fa fa-trash'></span> Eliminar</button> ";
            html += "</td>"            
            html += "</tr>";

        });
        document.getElementById("datos").innerHTML = html;
    }).fail(function(responde){
        console.log(responde);

    });
}
function ConsultarPorId(idPaciente){
    $.ajax({

        url: url,
        data: {"idPaciente" : idPaciente, "accion" : "CONSULTAR_ID"},
        TYPE: 'post',
        dataType: 'json'
    }).done(function(response){
        document.getElementById('nombre').value = response.nombre;
        document.getElementById('apellidos').value = response.apellidos;
        document.getElementById('cedula').value = response.cedula;
        document.getElementById('telefono').value;
        document.getElementById('direccion').value;
        document.getElementById('sexo').value;
        document.getElementById('nacimiento').value;
        document.getElementById('fecha_creacion').value = response.fecha_creacion;
        document.getElementById('idPaciente').value = response.idPaciente;

    }).fail(function(response){
        console.log(response);
    });

    }
    
function Guardar(){
    $.ajax({
        
    }).done(function(response){
        
    }).fail(function(respose){

        console.log(response);
    });
    
    
}
function Modificar(){
    
}
function Eliminar(idPaciente){

    $.ajax({
        url: url,
        data: {"idPaciente": idPaciente, "accion": "ELIMINAR"},
        type:'POST',
        dataType: 'json'
    }).done(function(response){
        if(response == "OK"){
            alert("Datos guardados con exito");
        }else{
            alert(response);

        }
    }).fail(function(respose){

        console.log(response);
    });
    
}
function Validar(){
    nombre = document.getElementById('nombre').value;
    apellidos = document.getElementById('apellidos').value;
    cedula = document.getElementById('cedula').value;
    telefono = document.getElementById('telefono').value;
    direccion = document.getElementById('direccion').value;
    sexo = document.getElementById('sexo').value;
    nacimiento = document.getElementById('nacimiento').value;
    fecha_creacion = document.getElementById('fecha_creacion').value;

    if(nombre == "" || apellidos == "" || cedula == "" || telefono == ""
     || direccion == "" || sexo == "" || nacimiento =="" || fecha_creacion == ""){
        return false;
     }
    return true;

}

function retornarDatos(agregarId, accion){
    return{
        "nombre " : document.getElementById('nombre').value,
        "apellidos" : document.getElementById('apellidos').value,
        "cedula" : document.getElementById('cedula').value,
        "telefono" : document.getElementById('telefono').value,
        "direccion" : document.getElementById('direccion').value,
        "sexo" : document.getElementById('sexo').value,
        "nacimiento" : document.getElementById('nacimiento').value,
        "fecha_creacion" : document.getElementById('fecha_creacion').value,

    }
}