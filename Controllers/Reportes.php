<?php 

    class Reportes extends Controllers
    {
        public function __construct()
        {
            session_start();
            parent::__construct();
        }
        public function Reportes (){
            $data['page_tag'] = "Reportes";
            $data['page_title'] = "REPORTES <small>Agenda Digital </small>";
            $data['page_name'] = "reportes";
            $data['page_functions']="functions_reportes.js";
            $data['lastOrders'] = $this->model->lastOrders();
            
        
            $anio = date('Y');
			$mes = date('m');
            $data['ventasMDia'] = $this->model->selectVentasMes($anio,$mes);
            //dep($data['ventasMDia']);exit;
           

			$this->views->getView($this,"reportes", $data);	
            
        }

        
		
    }
