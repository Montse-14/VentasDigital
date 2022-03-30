<?php
class Ventas extends Controllers
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function Ventas()
    {
        $data['page_tag'] = "Ventas";
        $data['page_title'] = "Ventas <small>Agenda Digital </small>";
        $data['page_name'] = "ventas";
        $data['page_functions']="funtions_ventas.js";
        $this->views->getView($this, "ventas", $data);
    }
    public  function setVentas(){ 
        if($_POST){
            if(empty($_POST['listidcliente'])||empty($_POST['txtconcepto'])||empty($_POST['txtdescripcion'])||empty($_POST['txtsubto']) 
            ||empty($_POST['txtIva'])  ||empty($_POST['txtTotal']) ||empty($_POST['txtfecha']))
            {
                $arrResponse=array("status" => false, "msg"=>'Datos Incorrectos');
            }else{
                $idventa = intval($_POST['idventa']);
                $strNombre= intval(strClean($_POST['listidcliente']));
                $strconcepto=ucwords(strClean($_POST['txtconcepto']));
                $strdescripcion=ucwords(strClean($_POST['txtdescripcion']));
                $intsub = intval($_POST['txtsubto']);
                $intiva= intval(strClean($_POST['txtIva']));
                $inttotal= intval(strClean($_POST['txtTotal']));
                //$intmonto=ucwords(strClean($_POST['txtmonto']));
                $strFecha=(strClean($_POST['txtfecha']));
    
                
                 
                    if($idventa == 0){
                        $option = 1;

                        $request_cliente=$this -> model->insertVenta(
                            $strNombre,
                            $strconcepto,
                            $strdescripcion,
                            $intsub,
                            $intiva,
                            $inttotal,

                            //$intmonto,
                            $strFecha);

                    }else{
                        $option = 2;
                        $request_cliente=$this -> model->updateVenta($idventa,
                            $strNombre,
                            $strconcepto,
                            $strdescripcion,
                            $intsub,
                            $intiva,
                            $inttotal,
                            //$intmonto,
                            $strFecha);

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







    public function getVentas(){
        $arrData = $this->model->selectVentas();
        // dep($arrData);
        for ($i=0; $i < count($arrData); $i++) {

            if($arrData[$i]['estatus'] == 1)
            {
                $arrData[$i]['estatus'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $arrData[$i]['estatus'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            $arrData[$i]['subtotal']=SMONEY.' '.formatMoney($arrData[$i]['subtotal']);
            $arrData[$i]['iva']=SMONEY.' '.formatMoney($arrData[$i]['iva']);
            $arrData[$i]['total']=SMONEY.' '.formatMoney($arrData[$i]['total']);

            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-info btn-sm btnViewV" onClick="fntViewVentas('.$arrData[$i]['id_venta'].')" title="Ver Venta"><i class="fas fa-eye"></i></button>
            <button class="btn btn-primary  btn-sm btnEditV" onClick="fntEditVenta('.$arrData[$i]['id_venta'].')" title="Editar Venta"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger btn-sm btnDelV" onClick="fntDelVenta('.$arrData[$i]['id_venta'].')" title="Eliminar Venta"><i class="far fa-trash-alt"></i></button>
            </div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }

    // select una venta
    public function getventa(int $idventa){
			
        $idventa1 = intval($idventa);
        if($idventa1 > 0)
        {
            $arrData = $this->model->selectventa($idventa1);
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

    //eliminar un venta
    public function delVenta()
    {
        if ($_POST) {
            $intVenta = intval($_POST['idventa']);
            $requestDelete = $this->model->deleteVenta($intVenta);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la venta');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la venta.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

        public function getSelectVentas()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectNombresVentas();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
			
					$htmlOptions .= '<option value="'.$arrData[$i]['id_venta'].'">'.$arrData[$i]['concepto'].'</option>';
					
				}
			}
			echo $htmlOptions;
			die();		
		}
}