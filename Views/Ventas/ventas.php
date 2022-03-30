<?php 
//Trae estilos CSS
headerAdmin($data); 
//Para traer los modales
getModal('modalAddVentas', $data)
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
                    <div class="box-header">
                        <div class="col-md-6" style="padding: 0;">
                            <button class="form-control btn btn-primary" onclick="openModalV ();"><i class="glyphicon glyphicon-plus-sign"></i>Asignar Nueva venta</button>
                        </div>
                    </div>
                </div>




                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="tableventas">
                                <thead>
                                    <tr>
                                        <th>ID VENTA</th>
                                        <th>ID CLIENTE</th>
                                        <th>CONCEPTO</th>
                                        <th>DESCRIPCION</th>
                                        <th>SUBTOTAL</th>
                                        <th>IVA</th>
                                        <th>TOTAL</th>
                                        <th>FECHA</th>
                                        <th>ESTATUS</th>
                                        <th>ACCIONES</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
                <?php footerAdmin_DerechosA($data); ?>

            </div>
        </div>
    </div>
</div>

<script>
    const base_url = "<?= base_url(); ?>";
</script>

<?php footerAdmin($data); ?>