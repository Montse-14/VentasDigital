<?php
class VentasProductos extends Controllers
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function VentasProductos()
    {
        $data['page_tag'] = "VentasProductos";
        $data['page_title'] = "Ventas <small>Agenda Digital </small>";
        $data['page_name'] = "ventasproductos";
        $data['page_functions']="funtions_productosventas.js";
        $this->views->getView($this, "ventasproductos", $data);
    }
    public  function setVentasProductos(){ 
        if($_POST){
            if(empty($_POST['listidproductos'])||empty($_POST['listidventas'])||empty($_POST['txtcantidad'])||empty($_POST['txtCostoU']) 
            ||empty($_POST['txtCostoU']) )
            {
                $arrResponse=array("status" => false, "msg"=>'Datos Incorrectos');
            }else{
                $idventaP = intval($_POST['id_ventapro']);
                $strNombreP= intval(strClean($_POST['listidproductos']));
                $strcNombreV=ucwords(strClean($_POST['listidventas']));
                $intCantidad=ucwords(strClean($_POST['txtcantidad']));
                $intCostoU = intval($_POST['txtCostoU']);
                $inttotal= intval(strClean($_POST['txtTotal']));
            
    
                
                 
                    if($idventaP == 0){
                        $option = 1;

                        $request_cliente=$this -> model->insertVentaProductos(
                            $strNombreP,
                            $strcNombreV,
                            $intCantidad,
                            $intCostoU,
                            $inttotal);

                    }else{
                        $option = 2;
                        $request_cliente=$this -> model->updateVentaProductos($idventaP,
                        $strNombreP,
                        $strcNombreV,
                        $intCantidad,
                        $intCostoU,
                        $inttotal);

                    }




            
                if($request_cliente>0)
                {
                    if($option == 1){
                        $arrResponse=array('status' => true, 'msg'=>'Datos Guardado');

                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                    }
                   
                }else if($request_cliente=='exist'){
                    $arrResponse=array('status' => false, 'msg'=>'Datos Repetidos');
                }else{
                    $arrResponse=array("status" => false, "msg"=>'No es posible guardar datos');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }  
        die();
        }
        public function getVentaProducto(int $idventapro){
			
            $idventapro1 = intval($idventapro);
            if($idventapro1 > 0)
            {
                $arrData = $this->model->selectventaProducto($idventapro1);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    




    public function getVentasProductos(){
        // $arrData = $this-> model->selectProduCtosVentas();
        $arrData = $this-> model->selecVnetasProductos();
        // dep($arrData);
        for ($i=0; $i < count($arrData); $i++) {

            
            $arrData[$i]['costo_unitario']=SMONEY.' '.formatMoney($arrData[$i]['costo_unitario']);
            $arrData[$i]['total']=SMONEY.' '.formatMoney($arrData[$i]['total']);

            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-info btn-sm btnViewVP" onClick="fntViewVentasP('.$arrData[$i]['id_ventapro'].')" title="Ver Venta"><i class="fas fa-eye"></i></button>
            <button class="btn btn-primary  btn-sm btnEditVP" onClick="fntEditVentaP('.$arrData[$i]['id_ventapro'].')" title="Editar Venta"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger btn-sm btnDelVP" onClick="fntDelVentaP('.$arrData[$i]['id_ventapro'].')" title="Eliminar Venta"><i class="far fa-trash-alt"></i></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function delVentaProducto()
    {
        if ($_POST) {
            $intVentaP = intval($_POST['id_ventapro']);
            $requestDelete = $this->model->deleteVentaP($intVentaP);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la venta');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la venta.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}