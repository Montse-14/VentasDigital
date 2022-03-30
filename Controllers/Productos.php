<?php
class Productos extends Controllers{
    public function __construct()
    {
        session_start();
            parent::__construct();
    }
    public function Productos()
    {
        /*if (empty($_SESSION[¿permisosMod]['r'])){
            header("Location:".base_url().'/dashboard');
        }*/
        $data['page_tag']="Productos";
        $data['page_title']="PRODUCTOS";
        $data['page_name']="productos";
        $data['page_functions']="functions_productos.js";
        $this->views->getView($this,"productos",$data);
    }

		public function setProducto(){
			if ($_POST){
				if(empty($_POST['txtNombre']) || empty($_POST['txtPrecio']) || empty($_POST['txtdescripcion']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$idProd = intval($_POST['idProd']);
					$strNombre = strClean($_POST['txtNombre']);
					$intprecio = intval(strClean($_POST['txtPrecio']));
					$strdescripcion = strClean(strClean($_POST['txtdescripcion']));

						if($idProd==0)
						{
							$option=1;
							$request_producto=$this->model->insertProducto(
								$strNombre,
								$intprecio,
								$strdescripcion
							);

						}else{
							$option=2;
							$request_producto=$this->model->updateProducto(
								$idProd,
								$strNombre,
								$intprecio,
								$strdescripcion
							);
						}
					
				if($request_producto >0)
				{
					if($option == 1){
						$arrResponse = array("status" => true, "msg" => 'Datos guardados corectamente.');
					}else{
						$arrResponse = array("status" => true, "msg" => 'Datos actualizados corectamente.   si entras');
					}
					
				}else if($request_producto == 'exist'){
					$arrResponse = array("status" => false, "msg" => 'Atencion este producto ya se registro.');
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function getProductos()
	{
		$arrData = $this->model->selectProductos();
		for ($i=0; $i < count($arrData); $i++) {

			if($arrData[$i]['estatus'] == 1)
			{
				$arrData[$i]['estatus'] = '<span class="badge badge-success">Activo</span>';
			}else{
				$arrData[$i]['estatus'] = '<span class="badge badge-danger">Inactivo</span>';
			}
			$arrData[$i]['precio']=SMONEY.' '.formatMoney($arrData[$i]['precio']);

			$arrData[$i]['options'] = '<div class="text-center">
			<button class="btn btn-info btn-sm btnViewProducto" onClick="fntViewProducto('.$arrData[$i]['id_producto'].')" title="Ver Producto"><i class="fas fa-eye"></i></button>
			<button class="btn btn-primary  btn-sm btnEditProducto" onClick="fntEdiProducto('.$arrData[$i]['id_producto'].')" title="Editar Producto"><i class="fas fa-pencil-alt"></i></button>
			<button class="btn btn-danger btn-sm btnDelProducto" onClick="fntDelProducto('.$arrData[$i]['id_producto'].')" title="Eliminar Producto"><i class="far fa-trash-alt"></i></button>
			</div>';
		}
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	
	public function getProducto(int $id_producto){
		$id_producto1 = intval($id_producto);
		if($id_producto1 > 0)
		{
			$arrData = $this->model->selectProducto($id_producto1);
			if(empty($arrData))
			{
				$arrResponse = array("status" => false, "msg" => 'Datos no encontrados.');
			} else{
				$arrResponse=array("status"=> true, 'data'=>$arrData);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function delProducto()
	{
		if($_POST){
			$intIdpersona = intval($_POST['id_producto']);
			$requestDelete = $this->model->deleteProducto($intIdpersona);
			if($requestDelete)
			{
				$arrResponse = array('status' => true, 'msg' => "Se ha eliminado el cliente");
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el cliente.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function getSelectProductos()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectNombresProductos();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					
					$htmlOptions .= '<option value="'.$arrData[$i]['id_producto'].'">'.$arrData[$i]['nombre'].'</option>';
					
				}
			}
			echo $htmlOptions;
			die();		
		}

}
?>