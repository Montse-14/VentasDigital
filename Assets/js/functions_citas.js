var myModal = new bootstrap.Modal(document.getElementById('myModal'));
let frm = document.getElementById('formCitas');
let eliminarc = document.getElementById('btn-eliminarc');
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, listWeek'
        },
        events: base_url + "/Citas/listar",
        dateClick: function(info) {
            frm.reset();
            document.getElementById('idcitas').value = '';
            document.getElementById('exampleModalLabel').textContent = 'Agregar Evento';
            document.getElementById('btnAccion').textContent = 'Guardar Evento';
            eliminarc.classList.add('d-none');
            document.getElementById('fechacitasI').value = info.dateStr;
            myModal.show();

        },
        eventClick: function(info) {
            console.log(info);
            document.getElementById('exampleModalLabel').textContent = 'Modificar evento';
            document.getElementById('btnAccion').textContent = 'Actualizar Evento';
            eliminarc.classList.remove('d-none');
            document.getElementById('idcitas').value = info.event.id;
            document.getElementById('listidclientesc').value = info.event.extendedProps;
            document.getElementById('listidusuariosc').value = info.event.extendedProps;
            document.getElementById('fechacitasI').value = info.event.startStr;
            document.getElementById('fechacitasF').value = info.event.endStr;
            document.getElementById('comentarios').value = info.event.title;
            document.getElementById('medioC').value = info.event.tipo_contacto;
            document.getElementById('color').value = info.event.backgroundColor;
            myModal.show();
        }
    });

    calendar.render();
    frm.onsubmit = function(e) {
            e.preventDefault();
            const nombres = document.getElementById('listidclientesc').value;
            const usuarios = document.getElementById('listidusuariosc').value;
            const fI = document.getElementById('fechacitasI').value;
            const fF = document.getElementById('fechacitasF').value;
            const comen = document.getElementById('comentarios').value;
            const contac = document.getElementById('medioC').value;
            const color = document.getElementById('color').value;
            if (nombres == "" || usuarios == "" || fI == "" || fF == "" || comen == "" || contac == "" || color == "") {
                swal("Atencion", "Todos los campos son obligatorios.", "error");
                return false;
            }
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Citas/setCitas';
            var formData = new FormData(frm);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        myModal.hide();
                        frm.reset();
                        swal('Citas', objData.msg, 'success');
                        calendar.refetchEvents();



                    } else {
                        swal("Error", objData.msg, "error");
                    }

                }
            }
        },
        eliminarc.addEventListener('click', function(idcitas) {
            var idci = idcitas
            myModal.hide();
            swal({
                title: "Eliminar cita",
                text: "¿Realmente quiere eliminar datos de la cita?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url + '/Citas/delCitasC';
                    var strData = "idcitas=" + idci;
                    request.open("POST", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200) {
                            console.log(this.responseText);
                            var objData = JSON.parse(request.responseText);
                            if (objData.status) {
                                swal("Eliminar!", objData.msg, "success");
                                calendar.refetchEvents();

                            } else {
                                swal("Atención!", objData.msg, "error");
                            }
                        }
                    }
                }




            });

        })



});

function fntCitasNombres() {
    var ajaxUrl = base_url + '/Clientes/getSelectClientes';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listidclientesc').innerHTML = request.responseText;
            document.querySelector('#listidclientesc').value = 1;
            // $('#listidcliente').selectpicker('render');
        }
    }

}

// function fntEditCita(id_venta) {
//     document.querySelector('#titlemodalventas').innerHTML = "Actualizar Venta";
//     document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
//     document.querySelector('#btnactionguardarV').classList.replace("btn-primary", "btn-info");
//     document.querySelector('#btntext').innerHTML = "Actualizar";

//     var id_venta = id_venta;
//     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     var ajaxUrl = base_url + '/Ventas/getVenta/' + id_venta;
//     request.open("GET", ajaxUrl, true);
//     request.send();
//     request.onreadystatechange = function() {

//         if (request.readyState == 4 && request.status == 200) {
//             var objData = JSON.parse(request.responseText);

//             if (objData.status) {
//                 document.querySelector("#idventa").value = objData.data.id_venta;
//                 document.querySelector("#listidcliente").value = objData.data.id_cliente;
//                 document.querySelector("#txtconcepto").value = objData.data.concepto;
//                 document.querySelector("#txtdescripcion").value = objData.data.descripcion;
//                 document.querySelector("#txtsubto").value = objData.data.subtotal;
//                 document.querySelector("#txtIva").value = objData.data.subtotal;
//                 document.querySelector("#txtTotal").value = objData.data.subtotal;

//                 document.querySelector("#txtfecha").value = objData.data.fecha_registro;
//                 // document.querySelector("#listRolid").value = objData.data.idrol;


//                 // if (objData.data.status == 1) {
//                 //     document.querySelector("#listStatus").value = 1;
//                 // } else {
//                 //     document.querySelector("#listStatus").value = 2;
//                 // }
//                 // $('#listStatus').selectpicker('render');
//             }
//         }

//         $('#modalformaddVentas').modal('show');
//     }
// }

function fntCitasUsuarios() {
    var ajaxUrl = base_url + '/Usuarios/getSelectUsuarios';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listidusuariosc').innerHTML = request.responseText;
            document.querySelector('#listidusuariosc').value = 1;
            // $('#listidcliente').selectpicker('render');
        }
    }

}
window.addEventListener('load', function() {
    fntCitasNombres();
    fntCitasUsuarios();

}, false);