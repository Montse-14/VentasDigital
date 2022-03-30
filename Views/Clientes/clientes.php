<?php 
//Trae estilos CSS
headerAdmin($data); 
//Para traer los modales
 getModal('modalClientes', $data) 
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
                        <button class="form-control btn btn-primary" onclick="openModalC();"><i class="glyphicon glyphicon-plus-sign"></i>Agregar Nuevo Cliente</button>
                        </div>
                    </div>
                </div>




                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="tableClientes" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th></th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <!-- <th>Calle</th>
                                        <th>Numero de casa</th>
                                        <th>Colonia</th>
                                        <th>Estado</th> -->
                                        
                                        <th>Fecha de registro</th>
                                        <th>Estatus</th>
                                        <th>Acciones</th>
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

<?php footerAdmin($data); ?>