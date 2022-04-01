<script type="text/javascript" src="<?=  media(); ?>/js/es.js"></script>   
    
    <script src="<?=  media(); ?>/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=  media(); ?>/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=  media(); ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=  media(); ?>/vendor/slick/slick.min.js"></script>
    <script src="<?=  media(); ?>/vendor/wow/wow.min.js"></script>
    <script src="<?=  media(); ?>/vendor/animsition/animsition.min.js"></script>
    <script src="<?=  media(); ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?=  media(); ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=  media(); ?>/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="<?=  media(); ?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=  media(); ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=  media(); ?>/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=  media(); ?>/vendor/select2/select2.min.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.world.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?=  media(); ?>/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- graficas= --> 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- datepicker= --> 
    <script src="<?= media(); ?>/js/datepicker/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/plugins/bootstrap-select.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- Main JS= -->
    <script src="<?=  media();?>/js/main.js"></script>
    
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    
    <script type="text/javascript" src="<?=  media(); ?>/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?=  media(); ?>/js/main.min.js"></script>
    <script type="text/javascript" src="<?=  media(); ?>/js/moment.js"></script>
    <script type="text/javascript" src="<?=  media(); ?>/js/es.js"></script>
    
    <!-- Usuarios= -->
    <?php if ($data['page_name']=="usuarios"){ ?> 
        <script src="<?=  media();?>/js/functions_usuarios.js"></script>
    <?php } ?>

    <?php if ($data['page_name']=="clientes"){ ?> 
    <script src="<?=  media();?>/js/funtions_clientes.js"></script>
    <?php } ?>  
    
    <?php if ($data['page_name']=="ventas"){ ?> 
        <script src="<?=  media();?>/js/funtions_ventas.js"></script>
    <?php } ?>
    <?php if ($data['page_name']=="productos"){ ?> 
        <script src="<?=  media();?>/js/functions_productos.js"></script>
    <?php } ?>
    <?php if ($data['page_name']=="citas"){ ?> 
        <script src="<?=  media();?>/js/functions_citas.js"></script>
    <?php } ?>
    <?php if ($data['page_name']=="ventasproductos"){ ?> 
        <script src="<?=  media();?>/js/funtions_productosventas.js"></script>
    <?php } ?>
    <?php if ($data['page_name']=="reportes"){ ?> 
        <script src="<?=  media();?>/js/functions_reportes.js"></script>
    <?php } ?>
</body>

</html>