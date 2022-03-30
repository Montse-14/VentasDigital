var tablaProductos;

document.addEventListener('DOMContentLoaded', function() {
    tablaProductos = $('#tablaProductos').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Productos/getProductos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_producto" },
            { "data": "nombre" },
            { "data": "precio" },
            { "data": "descripcion" },
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

    var formAddProductos = document.querySelector("#formAddProductos");
    formAddProductos.onsubmit = function(e) {
        e.preventDefault();
        var strNombre = document.querySelector('#txtNombre').value;
        var intprecio = document.querySelector('#txtPrecio').value;
        var strdescripcion = document.querySelector('#txtdescripcion').value;


        if (strNombre == "" || intprecio == "" || strdescripcion == "") {
            swal("Atencion", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Productos/setProducto';
        var formData = new FormData(formAddProductos);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalformaddProductos').modal("hide");
                    formAddProductos.reset();
                    swal('Productos', objData.msg, 'success');
                    tablaProductos.api().ajax.reload()



                } else {
                    swal("Error", objData.msg, "error");
                }

            }
        }

    }

}, false);



function fntViewProducto(idProducto) {
    var idProducto = idProducto;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Productos/getProducto/' + idProducto;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                var estadoProducto = objData.data.estatus == 1 ?
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';


                document.querySelector("#celNombreP").innerHTML = objData.data.nombre;
                document.querySelector("#celPrecio").innerHTML = objData.data.precio;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celEstado").innerHTML = estadoProducto;

                $('#modalViewProductos').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelProducto(idProducto) {

    var idproducto1 = idProducto;
    swal({
        title: "Eliminar Produccto",
        text: "¿Realmente quiere eliminar el producto?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {

        if (isConfirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Productos/delProducto';
            var strData = "id_producto=" + idproducto1;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tablaProductos.api().ajax.reload(function() {

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







function fntEdiProducto(id_producto) {
    document.querySelector('#titlemodalProductos').innerHTML = "Actualizar Producto";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnactionguardarProd').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btntext').innerHTML = "Actualizar";
    var id_producto = id_producto;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Productos/getProducto/' + id_producto;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function() {

        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            document.querySelector("#idProd").value = objData.data.id_producto;
            document.querySelector('#txtNombre').value = objData.data.nombre;
            document.querySelector('#txtPrecio').value = objData.data.precio;
            document.querySelector('#txtdescripcion').value = objData.data.descripcion;

        }
    }
    $('#modalformaddProductos').modal('show');
}



function openModalProd() {

    document.querySelector('#idProd').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnactionguardarProd').classList.replace("btn-info", "btn-primary");
    // document.querySelector('#btnText').innerHTML = "Guardar";
    // document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formAddProductos').reset();
    $('#modalformaddProductos').modal('show');


}