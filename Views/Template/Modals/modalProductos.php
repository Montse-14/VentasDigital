<?php
ini_set('date.timezone', 'America/Mexico_City');
$date = date('Y-m-d H:i:s');
?>
<div class="modal fade" id="modalformaddProductos" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <div class="main-content">-->
        <div class="section__content section__content--p40">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">Formulario Productos</div>
                  <div class="card-body">
                    <div class="card-title">
                      <h3 class="text-center title-2" id="titlemodalProductos">Agregar Producto</h3>
                    </div>
                    <hr>
                    <form id="formAddProductos" name="formAddProductos">
                      <input id="idProd" name="idProd" type="hidden" class="form-control" value="">
                      <div class="form-group">
                      <label for="txtNombre" class=" control-label mb-1">Nombre<span class="text-danger"> *</span></label>
                        <input id="txtNombre" name="txtNombre" type="text" class="form-control" data-val="true" placeholder="Ingresar nombre">                    

                        </select>
                      </div>
                      <div class="form-group has-success">
                        <label for="txtPrecio" class=" control-label mb-1">Precio<span class="text-danger"> *</span></label>
                        <input id="txtPrecio" name="txtPrecio" type="text" class="form-control" data-val="true" placeholder="Ingresar precio">
                        <!-- <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
                      </div>
                      <div class="form-group">
                        <label for="txtdescripcion" class="control-label mb-1">Descripcion<span class="text-danger"> *</span></label>
                        <input id="txtdescripcion" name="txtdescripcion" type="text" class="form-control " value="" placeholder="Ingrese descripcion">

                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            
                          </div>
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
                        <button id="btnactionguardarProd" type="submit" class="btn btn-lg btn-info btn-block">
                          <!-- <i class="fa fa-lock fa-lg"></i>&nbsp; -->
                          <!-- <span id="payment-button-amount">Pay $100.00</span> -->
                          <span id="btntext">Guardar Producto</span>
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




<div class="modal fade" id="modalViewProductos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombre del producto:</td>
              <td id="celNombreP"></td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio"></td>
            </tr>
            <tr>
              <td>Descripcion:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
            
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