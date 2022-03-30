var tableClientes;
document.addEventListener('DOMContentLoaded', function() {

    tableClientes = $('#tableClientes').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Clientes/getClientes",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_cliente" },
            { "data": "nombre" },
            { "data": "apellidos" },
            { "data": "telefono" },
            { "data": "correo" },
            // { "data": "calle" },
            // { "data": "numero_casa" },
            // { "data": "colonia" },
            // { "data": "estado" },

            { "data": "fecha_registro" },
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
            "titleAttr": "Exportar a Excel",
            "className": "btn btn-success"
        }, {
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Exportar a PDF",
            "className": "btn btn-danger"
        }, {
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr": "Exportar a CSV",
            "className": "btn btn-info"
        }],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 5,
        "order": [
            [0, "desc"]
        ]
    });

    if (document.querySelector("#foto")) {
        var foto = document.querySelector("#foto");
        foto.onchange = function(e) {
            var uploadFoto = document.querySelector("#foto").value;
            var fileimg = document.querySelector("#foto").files;
            var nav = window.URL || window.webkitURL;
            var contactAlert = document.querySelector('#form_alert');
            if (uploadFoto != '') {
                var type = fileimg[0].type;
                var name = fileimg[0].name;
                if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value = "";
                    return false;
                } else {
                    contactAlert.innerHTML = '';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                    var objeto_url = nav.createObjectURL(this.files[0]);
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objeto_url + ">";
                }
            } else {
                alert("No selecciono foto");
                if (document.querySelector('#img')) {
                    document.querySelector('#img').remove();
                }
            }
        }
    }
    if (document.querySelector(".delPhoto")) {
        var delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function(e) {
            removePhoto();
        }
    }

    var formAddcliente = document.querySelector("#formAddcliente");
    formAddcliente.onsubmit = function(e) {
        e.preventDefault();
        var strNombre = document.querySelector('#txtnombrec').value;
        var strApellidos = document.querySelector('#txtapellidosc').value;
        var strNumero = document.querySelector('#txtnumero').value;
        var strCorreo = document.querySelector('#txtcorreo').value;
        var strCalle = document.querySelector('#txtcalle').value;
        var strnumCasa = document.querySelector('#txtnumCasa').value;
        var strColonia = document.querySelector('#txtcolonia').value;
        var strEdo = document.querySelector('#txtEdo').value;


        var strFecha = document.querySelector('#txtfechaR').value;


        if (strNombre == "" || strApellidos == "" || strNumero == "" || strCorreo == "" ||
            strCalle == "" || strnumCasa == "" || strColonia == "" || strEdo == "" ||
            strFecha == "") {
            swal("Atencion", "Todos los campos son obligatorios.", "error");
            return false;
        }




        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Clientes/setCliente';
        var formData = new FormData(formAddcliente);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalformcliente').modal("hide");
                    formAddcliente.reset();
                    swal('Clientes', objData.msg, 'success');
                    tableClientes.api().ajax.reload()



                } else {
                    swal("Error", objData.msg, "error");
                }

            }
        }

    }









}, false);


function removePhoto() {
    document.querySelector('#foto').value = "";
    document.querySelector('.delPhoto').classList.add("notBlock");
    document.querySelector('#img').remove();
}

function fntViewCliente(idpersona) {
    var idpersona = idpersona;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Clientes/getCliente/' + idpersona;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                var estadoCliente = objData.data.estatus == 1 ?
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celApellidos").innerHTML = objData.data.apellidos;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celCorreo").innerHTML = objData.data.correo;
                document.querySelector("#celCalle").innerHTML = objData.data.calle;
                document.querySelector("#celNumCasa").innerHTML = objData.data.numero_casa;
                document.querySelector("#celColonia").innerHTML = objData.data.colonia;
                document.querySelector("#celEdo").innerHTML = objData.data.estado;
                document.querySelector("#celImg").innerHTML = '<img src="' + objData.data.url_portada + '"></img>';
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fecha_registro;


                document.querySelector("#celEstatus").innerHTML = estadoCliente;

                $('#modalViewClientes').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditCliente(idCliente) {
    document.querySelector('#titleModalCliente').innerHTML = "Actualizar Cliente";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnactionguardarC').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btntext').innerHTML = "Actualizar Usuario";


    var idCliente = idCliente;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Clientes/getCliente/' + idCliente;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idCliente").value = objData.data.id_cliente;
                // document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
                document.querySelector("#txtnombrec").value = objData.data.nombre;
                document.querySelector("#txtapellidosc").value = objData.data.apellidos;
                document.querySelector("#txtnumero").value = objData.data.telefono;
                document.querySelector("#txtcorreo").value = objData.data.correo;

                document.querySelector("#txtcalle").value = objData.data.calle;
                document.querySelector("#txtnumCasa").value = objData.data.numero_casa;
                document.querySelector("#txtcolonia").value = objData.data.colonia;
                document.querySelector("#txtEdo").value = objData.data.estado;
                document.querySelector('#foto_actual').value = objData.data.imagen;
                document.querySelector("#txtfechaR").value = objData.data.fecha_registro;
                document.querySelector("#foto_remove").value = 0;
                // document.querySelector("#txtEmail").value = objData.data.correo;
                // document.querySelector("#selecttipou").value = objData.data.tipo;
                // document.querySelector("#listRolid").value = objData.data.idrol;
                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_portada;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_portada + ">";
                }

                if (objData.data.portada == 'add.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }

                // if (objData.data.status == 1) {
                //     document.querySelector("#listStatus").value = 1;
                // } else {
                //     document.querySelector("#listStatus").value = 2;
                // }
                // $('#listStatus').selectpicker('render');
            }
        }

        $('#modalformcliente').modal('show');
    }
}

function fntDelCliente(idpersona) {

    var idCliente = idpersona;
    swal({
        title: "Eliminar Usuario",
        text: "¿Realmente quiere eliminar el cliente?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Clientes/delCliente';
            var strData = "idCliente=" + idCliente;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableClientes.api().ajax.reload(function() {

                            // fntViewCliente();
                            // fntEditCliente();
                            // fntDelCliente();
                        });
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}

function openModalC() {

    document.querySelector('#idCliente').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnactionguardarC').classList.replace("btn-info", "btn-primary");
    // document.querySelector('#btnText').innerHTML = "Guardar";
    // document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formAddcliente').reset();
    $('#modalformcliente').modal('show');


}