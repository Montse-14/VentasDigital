<?php 
//Trae estilos CSS
headerAdmin($data); 
//Para traer los modales
getModal('modalVentasproductos', $data)
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
                            <button class="form-control btn btn-primary" onclick="openModalVP();"><i class="glyphicon glyphicon-plus-sign"></i>Asignar Nueva venta producto</button>
                        </div>
                    </div>
                </div>




                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="tableventasproductos">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PRODUCTO</th>
                                        <th>VENTA</th>
                                        <th>CANTIDAD</th>
                                        <th>COSTO UNITARIO</th>
                                        
                                        <th>TOTAL</th>
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