var tableUsuarios;
var tableDasboard;
document.addEventListener('DOMContentLoaded', function() {
    tableUsuarios = $('#tablaUsuarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Usuarios/getUsuarios",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_usuario" },
            { "data": "nombre" },
            { "data": "apellidos" },
            { "data": "correo" },
            { "data": "tipo" },
            { "data": "estatus" },
            { "data": "options" }

        ],
        'dom': 'lBfrtip',
        'buttons': [{
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr": "Copiar",
            "className": "btn btn-secondary"
        }, {
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr": "Esportar a Excel",
            "className": "btn btn-success"
        }, {
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Esportar a PDF",
            "className": "btn btn-danger"
        }, {
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr": "Esportar a CSV",
            "className": "btn btn-info"
        }],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 5,
        "order": [
            [0, "desc"]
        ]
    });


    tableDasboard = $('#tableDasboard').dataTable({

        "ajax": {
            "url": " " + base_url + "/Usuarios/getUsuariosDas",
            "dataSrc": ""
        },
        "columns": [

            { "data": "nombre" },

            { "data": "tipo" },
            { "data": "estatus" },


        ]
    });







    var formAdduser = document.querySelector("#formAdduser");
    formAdduser.onsubmit = function(e) {
        e.preventDefault();
        var strNombre = document.querySelector('#txtnombreu').value;
        var strApellidos = document.querySelector('#txtapellidosu').value;
        var strCorreo = document.querySelector('#txtcorreou').value;
        //var strUsuario = document.querySelector('#txtusuario').value;
        var strPassword = document.querySelector('#txtpassword').value;
        var strTipo = document.querySelector('#selecttipou').value;

        if (strNombre == "" || strApellidos == "" || strCorreo == "" || strPassword == "" ||
            strTipo == "") {
            swal("Atencion", "Todos los campos son obligatorios.", "error");
            return false;
        }




        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Usuarios/setUsuario';
        var formData = new FormData(formAdduser);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalformadduser').modal("hide");
                    formAdduser.reset();
                    swal('Usuarios', objData.msg, 'success');
                    tableUsuarios.api().ajax.reload()



                } else {
                    swal("Error", objData.msg, "error");
                }

            }
        }

    }

}, false);

function fntViewUsuario(idpersona) {
    var idpersona = idpersona;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Usuarios/getUsuario/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                var estadoUsuario = objData.data.estatus == 1 ?
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';
                var tipo = objData.data.tipo == 1 ?
                    '<span class="badge badge-success">Adminitrador</span>' :
                    '<span class="badge badge-info">Asistente</span>';

                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celApellidos").innerHTML = objData.data.apellidos;
                document.querySelector("#celCorreo").innerHTML = objData.data.correo;
                // document.querySelector("#celUsuario").innerHTML = objData.data.usuario;
                document.querySelector("#celTipo").innerHTML = tipo;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;

                $('#modalViewUsuarios').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditUsuario(idUsuario) {
    document.querySelector('#titleModalUsuario').innerHTML = "Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnactionguardarU').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btntext').innerHTML = "Actualizar Usuario";


    var idUsuario = idUsuario;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Usuarios/getUsuario/' + idUsuario;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idusuario").value = objData.data.id_usuario;
                // document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
                document.querySelector("#txtnombreu").value = objData.data.nombre;
                document.querySelector("#txtapellidosu").value = objData.data.apellidos;
                document.querySelector("#txtcorreou").value = objData.data.correo;
                document.querySelector("#txtusuario").value = objData.data.usuario;

                // document.querySelector("#txtEmail").value = objData.data.correo;
                document.querySelector("#selecttipou").value = objData.data.tipo;
                // document.querySelector("#listRolid").value = objData.data.idrol;


                // if (objData.data.status == 1) {
                //     document.querySelector("#listStatus").value = 1;
                // } else {
                //     document.querySelector("#listStatus").value = 2;
                // }
                // $('#listStatus').selectpicker('render');
            }
        }

        $('#modalformadduser').modal('show');
    }
}

function fntDelUsuario(idpersona) {

    var idUsuario = idpersona;
    swal({
        title: "Eliminar Usuario",
        text: "¿Realmente quiere eliminar el Usuario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Usuarios/delUsuario';
            var strData = "idusuario=" + idUsuario;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableUsuarios.api().ajax.reload(function() {

                            // fntViewUsuario();
                            // fntEditUsuario();
                            // fntDelUsuario();
                        });
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}

function openModal() {

    document.querySelector('#idusuario').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    // document.querySelector('#btnactionguardarU').classList.replace("btn-info", "btn-primary");
    // document.querySelector('#btnText').innerHTML = "Guardar";
    // document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formAdduser').reset();
    $('#modalformadduser').modal('show');


}
/*window.addEventListener('load', function()
{
    ftnPermisos();
},false);

function ftnPermisos(){
    var btnPermisosU=document.querySelectorAll(".btnPermisosU");
     btnPermisosU.forEach(function(btnPermisusU){
        btnPermisosU.addEventListener('clicl', function(){
            $('.modalPermisos').modal('show');
        });
        
    });
}*/