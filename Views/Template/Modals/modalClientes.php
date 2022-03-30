<?php
ini_set('date.timezone', 'America/Mexico_City');
$date = date('Y-m-d H:i:s');
?>
<div class="modal fade" id="modalformcliente" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <!-- <div class="main-content">-->
        <div class="section__content section__content--p40">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">Formulario Cliente</div>
                  <div class="card-body">
                    <div class="card-title">
                      <h3 class="text-center title-2 " id="titleModalCliente">Agregar Cliente</h3>
                    </div>
                    <hr>
                    <form action="" id="formAddcliente" name="formAddcliente" method="" novalidate="novalidate">
                      <input id="idCliente" name="idCliente" type="hidden" class="form-control" aria-required="true" aria-invalid="false" placeholder="Ingrese su nombre(s)" value="">
                      <input type="hidden" id="foto_actual" name="foto_actual" value="">
                      <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                      <div class="form-group">
                        <label for="txtnombrec" class="control-label mb-1">Nombre(s)<span class="text-danger"> *</span></label>
                        <input id="txtnombrec" name="txtnombrec" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Ingrese su nombre(s)" value="">
                      </div>
                      <div class="form-group has-success">
                        <label for="txtapellidosc" class="control-label mb-1">Apellidos<span class="text-danger"> *</span></label>
                        <input id="txtapellidosc" name="txtapellidosc" type="text" class="form-control cc-name valid" data-val="true" placeholder="Ingresar apellidos">
                        <!-- <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
                      </div>
                      <div class="form-group">
                        <label for="txtnumero" class="control-label mb-1">Telefono<span class="text-danger"> *</span></label>
                        <input id="txtnumero" name="txtnumero" type="text" class="form-control " value="" placeholder="Ingrese el número de celular">

                      </div>
                      <div class="form-group">
                        <label for="txtcorreo" class="control-label mb-1">Correo<span class="text-danger"> *</span></label>
                        <input id="txtcorreo" name="txtcorreo" type="text" class="form-control " value="" placeholder="Ingrese el correo">

                      </div>
                      <div class="form-group">
                        <label for="txtcalle" class="control-label mb-1">calle<span class="text-danger"> *</span></label>
                        <input id="txtcalle" name="txtcalle" type="text" class="form-control " value="" placeholder="Ingrese la calle">
                      </div>
                      <div class="form-group">
                        <label for="txtnumCasa" class="control-label mb-1">Numero C<span class="text-danger"> *</span></label>
                        <input id="txtnumCasa" name="txtnumCasa" type="text" class="form-control " value="" placeholder="Ingrese el numero de casa">
                      </div>
                      <div class="form-group">
                        <label for="txtcolonia" class="control-label mb-1">colonia C<span class="text-danger"> *</span></label>
                        <input id="txtcolonia" name="txtcolonia" type="text" class="form-control " value="" placeholder="Ingrese la colonia">
                      </div>
                      <div class="form-group">
                        <label for="txtEdo" class="control-label mb-1">Estado <span class="text-danger"> *</span></label>
                        <input id="txtEdo" name="txtEdo" type="text" class="form-control " value="" placeholder="Ingrese el estado">
                      </div>
                      <div class="form-group">
                        <div class="photo">
                          <label for="foto">Foto (570x380)</label>
                          <div class="prevPhoto">
                            <span class="delPhoto notBlock">X</span>
                            <label for="foto"></label>
                            <div>
                              <img id="img" src="<?= media(); ?>/img/uploads/add.png">
                            </div>
                          </div>
                          <div class="upimg">
                            <input type="file" name="foto" id="foto">
                          </div>
                          <div id="form_alert"></div>
                        </div>
                      </div>





                      <!-- <div class="row">
                                                <div class="col-6">
                                                    <label for="txtpasswordc" class="control-label mb-1">password<span class="text-danger"> *</span></label>
                                                    <div class="input-group">
                                                        <input id="txtpasswordc" name="txtpasswordc" type="password" class="form-control cc-cvc" value="" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div> -->
                      <div class="row">
                        <div class="col-6">
                          <label for="txtfechaR" class="control-label mb-1">Fecha de registro<span class="text-danger"> *</span></label>
                          <div class="input-group">
                            <input id="txtfechaR" name="txtfechaR" type="text" class="form-control cc-cvc" value="<?php echo $date ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div>
                        <button id="btnactionguardarC" type="submit" class="btn btn-lg btn-info btn-block"><span id="btntext">Guardar cliente</span>


                          <!-- <i class="fa fa-lock fa-lg"></i>&nbsp; -->
                          <!-- <span id="payment-button-amount">Pay $100.00</span> -->

                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--</div> -->
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modalViewClientes" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal"> Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellidos"></td>
            </tr>
            <tr>
              <td>Celular:</td>
              <td id="celTelefono"></td>
            </tr>
            <tr>
              <td>Correo:</td>
              <td id="celCorreo"></td>
            </tr>
            <tr>
              <td>Calle:</td>
              <td id="celCalle"></td>
            </tr>
            <tr>
              <td>No de casa:</td>
              <td id="celNumCasa"></td>
            </tr>
            <tr>
              <td>Colonia:</td>
              <td id="celColonia"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEdo"></td>
            </tr>

            <tr>
              <td>Imagen:</td>
              <td id="celImg"></td>
            </tr>
            <tr>
              <td>Fecha Registro:</td>
              <td id="celFechaRegistro"></td>
            </tr>

            <tr>
              <td>Estatus:</td>
              <td id="celEstatus"></td>
            </tr>
            <!-- <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro">Larry</td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<script>
  const base_url = "<?= base_url(); ?>";
</script>