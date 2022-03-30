<?php
ini_set('date.timezone', 'America/Mexico_City');
$date = date('Y-m-d H:i:s');
?>
<div class="modal fade" id="modalformaddVentas" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <div class="main-content">-->
        <div class="section__content section__content--p40">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">Formulario ventas</div>
                  <div class="card-body">
                    <div class="card-title">
                      <h3 class="text-center title-2" id="titlemodalventas">Asignar ventas</h3>
                    </div>
                    <hr>
                    <form id="formAddventas" name="formAddventas">
                      <input id="idventa" name="idventa" type="hidden" class="form-control" value="">
                      <div class="form-group">
                        <label for="listidcliente" class="control-label mb-1">Nombre(s)<span class="text-danger"> *</span></label>
                        <select class="form-control" data-live-search="true" id="listidcliente" name="listidcliente" required>

                        </select>
                      </div>
                      <div class="form-group has-success">
                        <label for="txtconcepto" class=" control-label mb-1">Concepto<span class="text-danger"> *</span></label>
                        <input id="txtconcepto" name="txtconcepto" type="text" class="form-control" data-val="true" placeholder="Ingresar concepto">
                        <!-- <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
                      </div>
                      <div class="form-group">
                        <label for="txtdescripcion" class="control-label mb-1">Descripcion<span class="text-danger"> *</span></label>
                        <input id="txtdescripcion" name="txtdescripcion" type="text" class="form-control " value="" placeholder="Ingrese descripcion">

                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="txtsubto" class="control-label mb-1">Subtotal<span class="text-danger"> *</span></label>
                            <input id="txtsubto" name="txtsubto" type="text" class="form-control" value="" placeholder="Ingrese el subtotal $$"  onkeyup="calculo();">   <!-- o podemos usar onChange/*-->

                          </div>
                        </div>
                        <div class="col-6">
                          <label for="txtpassword" class="control-label mb-1">IVA<span class="text-danger"> *</span></label>
                          <div class="input-group">
                            <input id="txtIva" name="txtIva" type="text" class="form-control cc-cvc"  autocomplete="off" placeholder="IVA" readonly>

                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="txtsubto" class="control-label mb-1">Total<span class="text-danger"> *</span></label>
                            <input id="txtTotal" name="txtTotal" type="text" class="form-control" value="" placeholder="Total" readonly>

                          </div>
                        </div>
                        <div class="col-6">
                          <label for="txtpassword" class="control-label mb-1">Fecha<span class="text-danger"> *</span></label>
                          <div class="input-group">
                            <input id="txtfecha" name="txtfecha" type="text" class="form-control cc-cvc" value="<?php echo $date ?>" autocomplete="off" readonly>

                          </div>
                        </div>
                      </div>
                      <!-- <div class="form-group">
                                                <label for="selecttipou" class="control-label mb-1">Tipo</label>

                                                <select name="selecttipou" id="selecttipou" class="form-control">
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Asistente</option>

                                                </select>
                                            </div> -->
                      <div>
                        <button id="btnactionguardarV" type="submit" class="btn btn-lg btn-info btn-block">
                          <!-- <i class="fa fa-lock fa-lg"></i>&nbsp; -->
                          <!-- <span id="payment-button-amount">Pay $100.00</span> -->
                          <span id="btntext">Guardar Venta</span>
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




<div class="modal fade" id="modalViewVentas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de las ventas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Concepto:</td>
              <td id="celConcepto"></td>
            </tr>
            <tr>
              <td>Descripcion:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Subtotal:</td>
              <td id="celSub"></td>
            </tr>
            <tr>
              <td>IVA:</td>
              <td id="celIva"></td>
            </tr>
            <tr>
              <td>Total:</td>
              <td id="celTotal"></td>
            </tr>
            <tr>
              <td>Fecha:</td>
              <td id="celFecha"></td>
            </tr>
            <!-- <tr>
              <td>Tipo Usuario:</td>
              <td id="celTipoUsuario">Larry</td>
            </tr> -->
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
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