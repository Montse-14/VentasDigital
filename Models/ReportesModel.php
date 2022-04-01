<?php 
	class ReportesModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

        public function lastOrders(){
			

			$sql = "SELECT V.id_venta ,C.nombre,V.total, V.estatus 
            FROM clientes C 
            INNER JOIN ventas V on C.id_cliente = v.id_cliente WHERE V.estatus != 0
			ORDER BY v.id_venta DESC LIMIT 10 ";
			$request = $this->select_all($sql);
			return $request;
		}

		
		public function selectVentasMes(int $anio, int $mes){
			
			$totalVentasMes = 0;
			$arrVentaDias = array();
			$dias = cal_days_in_month(CAL_GREGORIAN,$mes, $anio);
			$n_dia = 1;
			for ($i=0; $i < $dias ; $i++) { 
				$date = date_create($anio."-".$mes."-".$n_dia);
				$fechaVenta = date_format($date,"Y-m-d");
				$sql = "SELECT DAY(fecha_registro) AS dia, COUNT(id_venta) AS cantidad, SUM(total) AS Total 
						FROM ventas 
						WHERE DATE(fecha_registro) = '$fechaVenta' AND estatus = '1' ";
				$ventaDia = $this->select($sql);
				$ventaDia['dia'] = $n_dia;
				$ventaDia['Total'] = $ventaDia['Total'] == "" ? 0 : $ventaDia['Total'];
				$totalVentasMes += $ventaDia['Total'];
				array_push($arrVentaDias, $ventaDia);
				$n_dia++;
			}
			$meses = Meses();
			$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'Total' => $totalVentasMes,'ventas' => $arrVentaDias );
			return $arrData;
		}
		
	}
 ?>