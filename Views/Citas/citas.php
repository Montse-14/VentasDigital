<?php
//Trae estilos CSS
headerAdmin($data);
//Para traer los modales
//getModal('modalCita', $data)
?>

<?php
//Para encabezado
profileAdmin($data);
?>
<div class="page-container">
  <div class="main-content">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="box">
          <div id='calendar'></div>

        </div>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agendar Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCitas" action="">
          <div class="modal-body">
            <div class="mb-3">
              <div class="form-group">
                <input id="idcitas" name= "idcitas" class="form-control"  type= "hidden">
                <label for="listidclientesc" class="control-label mb-1">Nombre(s) clientes<span class="text-danger"> *</span></label>
                <select class="form-control" data-live-search="true" id="listidclientesc" name="listidclientesc" >

                </select>
              </div>
              <div class="form-group">
                <label for="listidusuariosc" class="control-label mb-1">Usuarios<span class="text-danger"> *</span></label>
                <select class="form-control" data-live-search="true" id="listidusuariosc" name="listidusuariosc" >

                </select>
              </div>
              <div class="form-group">
                <label for="fechacitasI" class="control-label mb-1">Fecha Inicio<span class="text-danger"> *</span></label>
                <input type="date" class="form-control" data-live-search="true" id="fechacitasI" name="fechacitasI" >
              </div>
              <div class="form-group">
                <label for="fechacitasF" class="control-label mb-1">Fecha Final<span class="text-danger"> *</span></label>
                <input type="date" class="form-control" data-live-search="true" id="fechacitasF" name="fechacitasF" >
              </div>
              <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="medioC" class="control-label mb-1">Medio de contacto<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" data-live-search="true" id="medioC" name="medioC" >
              </div>

              <div class="form-group">
                <label for="color" class="control-label mb-1">Medio de contacto<span class="text-danger"> *</span></label>
                <input type="color" class="form-control" data-live-search="true" id="color" name="color" >
              </div>
            </div>


          </div>
          <div class="">

          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="btn-eliminarc" data-dismiss="modal">Eliminar</button>
        <button type="submit" class="btn btn-primary" id="btnAccion">Guardar cita</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>

</div>








<script>
  const base_url = "<?= base_url(); ?>";
</script>

<?php footerAdmin($data); ?>