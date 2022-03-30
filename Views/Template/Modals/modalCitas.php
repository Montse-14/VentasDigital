ini_set('date.timezone', 'America/Mexico_City');
$date = date('Y-m-d H:i:s');
?>
<div class="modal fade" id="modalCita" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <!-- <div class="main-content">-->
        <div class="section__content section__content--p40">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">Agendar cita</div>
                  <div class="card-body">
                    <div class="card-title">
                      <h3 class="text-center title-2 " id="titleModalCita">Agregar Cita</h3>
                    </div>
                    <hr>
                    <form action="" id="addCita" name="addCita" method="" novalidate="novalidate">
                      <input id="idCita" name="idCita" type="hidden" class="form-control" aria-required="true" aria-invalid="false" placeholder="Ingrese su nombre(s)" value="">
                      
                      <div class="form-group">
                        <label for="listidcliente" class="control-label mb-1">Nombre(s)<span class="text-danger"> *</span></label>
                            <select class="form-control" data-live-search="true" id="listidcliente" name="listidcliente" required>
                            </select>
                            <label for="listidusuario" class="control-label mb-1">Nombre(s)<span class="text-danger"> *</span></label>
                            <select class="form-control" data-live-search="true" id="listidusuario" name="listidcliente" required>    
                      </div>
                      
                      <div class="form-group">
                            <label for="start">Start date:</label>
                            <input type="date" id="start" name="trip-start"value="" min="2018-01-01" max="2018-12-31">
                      </div>
                      <div class="form-group">
                            <label for="start">Start date:</label>
                            <input id="txtfecha" name="txtfecha" type="text" class="form-control cc-cvc" value="<?php echo $date ?>" autocomplete="off" readonly>
                      </div>
                      <div class="form-group">
                        <label for="txtcomentarios" class="control-label mb-1">Comentarios<span class="text-danger"> *</span></label>
                        <input id="txtcomentarios" name="txtcomentarios" type="text" class="form-control " value="" placeholder="Ingrese comentarios a tratar de la cita">
                      </div>
                      <div class="form-group">
                        <label for="txtipo" class="control-label mb-1">TipoContacto<span class="text-danger"> *</span></label>
                        <input id="txtipo" name="txtipo" type="text" class="form-control " value="" placeholder="Telefono/llamada/Videollada...">

                      </div>
                      

                      <div>
                        <button id="btnAgendar" type="submit" class="btn btn-lg btn-info btn-block"><span id="btntext">Agendar</span>


                        
      </div>
    </div>
  </div>
</div>
 



