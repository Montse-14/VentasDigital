var tableProductosVentas;

document.addEventListener('DOMContentLoaded', function() {

    tableProductosVentas = $('#tableventasproductos').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/VentasProductos/getVentasProductos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_ventapro" },
            { "data": "nombre" },
            { "data": "concepto" },
            { "data": "cantidad" },
            { "data": "costo_unitario" },
            { "data": "total" },
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

    var formVentasProductos = document.querySelector("#formVentasProductos");
    formVentasProductos.onsubmit = function(e) {
        e.preventDefault();
        var strIdproductos = document.querySelector('#listidproductos').value;
        var strIdventas = document.querySelector('#listidventas').value;
        var strcantidad = document.querySelector('#txtcantidad').value;
        var strCostoU = document.querySelector('#txtCostoU').value;
        var strTotal = document.querySelector('#txtTotal').value;


        if (strIdproductos == "" || strIdventas == "" || strcantidad == "" || strCostoU == "" || strTotal == "") {
            swal("Atencion", "Todos los campos son obligatorios.", "error");
            return false;
        }




        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/VentasProductos/setVentasProductos';
        var formData = new FormData(formVentasProductos);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalVentasproductos').modal("hide");
                    formVentasProductos.reset();
                    swal('Ventas-Productos', objData.msg, 'success');
                    tableProductosVentas.api().ajax.reload()



                } else {
                    swal("Error", objData.msg, "error");
                }

            }
        }

    }






}, false);

function fntProductosNombres() {
    var ajaxUrl = base_url + '/Productos/getSelectProductos';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listidproductos').innerHTML = request.responseText;
            document.querySelector('#listidproductos').value = 1;
            // $('#listidcliente').selectpicker('render');
        }
    }

}

function fntVentasNombres() {
    var ajaxUrl = base_url + '/ventas/getSelectVentas';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listidventas').innerHTML = request.responseText;
            document.querySelector('#listidventas').value = 1;
            // $('#listidcliente').selectpicker('render');
        }
    }

}

function fntEditVentaP(id_ventaPro) {
    document.querySelector('#titlemodalventasProductos').innerHTML = "Actualizar Venta-Productos";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnactionguardarVP').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btntext').innerHTML = "Actualizar";

    var id_ventaPro = id_ventaPro;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/VentasProductos/getVentaProducto/' + id_ventaPro;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#id_ventapro").value = objData.data.id_ventapro;
                document.querySelector("#listidproductos").value = objData.data.id_producto;
                document.querySelector("#listidventas").value = objData.data.id_venta;
                document.querySelector("#txtcantidad").value = objData.data.cantidad;
                document.querySelector("#txtCostoU").value = objData.data.costo_unitario;

                document.querySelector("#txtTotal").value = objData.data.total;



                // document.querySelector("#listRolid").value = objData.data.idrol;


                // if (objData.data.status == 1) {
                //     document.querySelector("#listStatus").value = 1;
                // } else {
                //     document.querySelector("#listStatus").value = 2;
                // }
                // $('#listStatus').selectpicker('render');
            }
        }

        $('#modalVentasproductos').modal('show');
    }
}

function fntViewVentasP(idventaP) {
    var idventaP = idventaP;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/VentasProductos/getVentaProducto/' + idventaP;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                // var estadoUsuario = objData.data.estatus == 1 ?
                //     '<span class="badge badge-success">Activo</span>' :
                //     '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celProducto").innerHTML = objData.data.nombre;
                document.querySelector("#celVenta").innerHTML = objData.data.concepto;
                document.querySelector("#celCantidad").innerHTML = objData.data.cantidad;
                document.querySelector("#celCostoUnitario").innerHTML = objData.data.costo_unitario;

                document.querySelector("#celTotal").innerHTML = objData.data.total;

                $('#modalViewVentasP').modal('show');
            } else {
                swal("Error n", objData.msg, "error");
            }
        }
    }
}

function fntDelVentaP(idproduven) {

    var idpv = idproduven;
    swal({
        title: "Eliminar Venta",
        text: "¿Realmente quiere eliminar datos de venta - producto?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/VentasProductos/delVentaProducto';
            var strData = "id_ventapro=" + idpv;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableProductosVentas.api().ajax.reload(function() {

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

function openModalVP() {

    document.querySelector('#id_ventapro').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnactionguardarVP').classList.replace("btn-info", "btn-primary");
    // document.querySelector('#btnText').innerHTML = "Guardar";
    // document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formVentasProductos').reset();
    $('#modalVentasproductos').modal('show');


}
window.addEventListener('load', function() {
    fntProductosNombres();
    fntVentasNombres();

}, false);

function calculoVP() {


    var cantidad = $("input[name=txtcantidad]").val();

    var costo = $("input[name=txtCostoU]").val();


    var total = (cantidad * costo);

    //se carga el iva en el campo correspondien te
    $("input[name=txtTotal]").val(total);



}