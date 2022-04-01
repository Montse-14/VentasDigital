var tableVentas;

document.addEventListener('DOMContentLoaded', function() {

    tableVentas = $('#tableventas').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Ventas/getVentas",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_venta" },
            { "data": "nombre" },
            { "data": "concepto" },
            { "data": "descripcion" },
            { "data": "subtotal" },
            { "data": "iva" },
            { "data": "total" },
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

    var formAddventas = document.querySelector("#formAddventas");
    formAddventas.onsubmit = function(e) {
        e.preventDefault();
        var strIdcliente = document.querySelector('#listidcliente').value;
        var strconcepto = document.querySelector('#txtconcepto').value;
        var strDescripcion = document.querySelector('#txtdescripcion').value;
        var strSubto = document.querySelector('#txtsubto').value;
        var strIva = document.querySelector('#txtIva').value;
        var strTotal = document.querySelector('#txtTotal').value;
        var strFechaegistro = document.querySelector('#txtfecha').value;
        // var strTipo = document.querySelector('#selecttipou').value;

        if (strIdcliente == "" || strconcepto == "" || strDescripcion == "" || strSubto == "" || strIva == "" || strTotal == "" || strFechaegistro == "") {
            swal("Atencion", "Todos los campos son obligatorios.", "error");
            return false;
        }




        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Ventas/setVentas';
        var formData = new FormData(formAddventas);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalformaddVentas').modal("hide");
                    formAddventas.reset();
                    swal('Ventas', objData.msg, 'success');
                    tableVentas.api().ajax.reload()



                } else {
                    swal("Error", objData.msg, "error");
                }

            }
        }

    }






}, false);



function fntNombresClientes() {
    var ajaxUrl = base_url + '/Clientes/getSelectClientes';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listidcliente').innerHTML = request.responseText;
            document.querySelector('#listidcliente').value = 1;
            // $('#listidcliente').selectpicker('render');
        }
    }

}


//ver modal tabla --> boton ver venta
function fntViewVentas(idventa) {
    var idventa = idventa;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Ventas/getVenta/' + idventa;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                var estadoUsuario = objData.data.estatus == 1 ?
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celConcepto").innerHTML = objData.data.concepto;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celSub").innerHTML = objData.data.subtotal;

                document.querySelector("#celIva").innerHTML = objData.data.iva;
                document.querySelector("#celTotal").innerHTML = objData.data.total;

                document.querySelector("#celFecha").innerHTML = objData.data.fecha_registro;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;
                // document.querySelector("#celEstado").innerHTML = estadoUsuario;
                // document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
                $('#modalViewVentas').modal('show');
            } else {
                swal("Error n", objData.msg, "error");
            }
        }
    }
}

//editar venta venta
function fntEditVenta(id_venta) {
    document.querySelector('#titlemodalventas').innerHTML = "Actualizar Venta";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnactionguardarV').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btntext').innerHTML = "Actualizar";

    var id_venta = id_venta;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Ventas/getVenta/' + id_venta;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idventa").value = objData.data.id_venta;
                document.querySelector("#listidcliente").value = objData.data.id_cliente;
                document.querySelector("#txtconcepto").value = objData.data.concepto;
                document.querySelector("#txtdescripcion").value = objData.data.descripcion;
                document.querySelector("#txtsubto").value = objData.data.subtotal;
                document.querySelector("#txtIva").value = objData.data.subtotal;
                document.querySelector("#txtTotal").value = objData.data.subtotal;

                document.querySelector("#txtfecha").value = objData.data.fecha_registro;
                // document.querySelector("#listRolid").value = objData.data.idrol;


                // if (objData.data.status == 1) {
                //     document.querySelector("#listStatus").value = 1;
                // } else {
                //     document.querySelector("#listStatus").value = 2;
                // }
                // $('#listStatus').selectpicker('render');
            }
        }

        $('#modalformaddVentas').modal('show');
    }
}

//Boton eliminar venta
function fntDelVenta(idCliente) {

    var idventa = idCliente;
    swal({
        title: "Eliminar Venta",
        text: "¿Realmente quiere eliminar datos de la venta?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Ventas/delVenta';
            var strData = "idventa=" + idventa;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableVentas.api().ajax.reload(function() {

                            // fntViewVentas();
                            // fntEditUsuario();
                            // fntDelVenta();
                        });
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}



function openModalV() {

    document.querySelector('#idventa').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnactionguardarV').classList.replace("btn-info", "btn-primary");
    // document.querySelector('#btnText').innerHTML = "Guardar";
    // document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formAddventas').reset();
    $('#modalformaddVentas').modal('show');


}

window.addEventListener('load', function() {
    fntNombresClientes();
    /*fntViewUsuario();
    fntEditUsuario();
    fntDelUsuario();*/
}, false);

function calculo() {
    //tasa de impuesto
    var tasa = 0.16;

    //monto a calcular el impuesto
    var monto = $("input[name=txtsubto]").val();

    //calculo del impuesto
    var iva = (monto * tasa);

    //se carga el iva en el campo correspondien te
    $("input[name=txtIva]").val(iva);

    //se carga el total en el campo correspondiente
    $("input[name=txtTotal]").val(parseInt(monto) + parseInt(iva));

}