<?php headerAdmin($data); ?>

<?php 
//Para encabezado
profileAdmin($data); 
?>
<div class="page-container">
  <div class="main-content">
    <div class="section_content section_content--p30">

      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
        </div>
        <!-- <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/reportes">Reportes</a></li>
        </ul> -->
      </div>



      <div class="row">

        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Últimas Ventas</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th class="text-right">Monto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (count($data['lastOrders']) > 0) {
                  foreach ($data['lastOrders'] as $pedido) {
                ?>
                    <tr>
                      <td><?= $pedido['id_venta'] ?></td>
                      <td><?= $pedido['nombre'] ?></td>
                      <td><?= $pedido['estatus'] ?></td>
                      <td class="text-right"><?= SMONEY . " " . formatMoney($pedido['total']) ?></td>

                  <?php
                  }
                } ?>

              </tbody>
            </table>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="tile">
              <div class="container-title">
                <h3 class="tile-title">Ventas por mes</h3>
                <div class="dflex">
                  <input class="date-picker ventasMes" name="ventasMes" placeholder="Mes y Año">
                  <button type="button" class="btnVentasMes btn btn-info btn-sm" onclick="fntSearchVMes()"> <i class="fas fa-search"></i> </button>
                </div>
              </div>
              <!-- <?php dep($data['ventasMDia']) ?> -->
              <div id="graficaMes"></div>
            </div>
          </div>

        </div>


      <?php footerAdmin($data); ?>
    </div>
  </div>
</div>


<script>

Highcharts.chart('graficaMes', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Ventas de <?= $data['ventasMDia']['mes'].' del '.$data['ventasMDia']['anio'] ?>'
    },
    subtitle: {
        text: 'Total Ventas <?= SMONEY.'. '.formatMoney($data['ventasMDia']['Total']) ?> '
    },
    xAxis: {
        categories: [
          <?php 
              foreach ($data['ventasMDia']['ventas'] as $dia) {
                echo $dia['dia'].",";
              }
          ?>
        ]
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Día',
        data: [
          <?php 
              foreach ($data['ventasMDia']['ventas'] as $dia) {
                echo $dia['Total'].",";
              }
          ?>
        ]
    }]
});



</script>