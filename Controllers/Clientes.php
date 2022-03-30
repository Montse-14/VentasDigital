<?php 

    class Clientes extends Controllers
    {
        public function __construct()
        {
            session_start();
            parent::__construct();
        }
        public function Clientes (){
            $data['page_tag'] = "Clientes";
            $data['page_title'] = "CLIENTES <small>Agenda Digital </small>";
            $data['page_name'] = "clientes";
            $data['page_functions']="functions_clientes.js";
            $this->views->getView($this,"clientes", $data);
        }
        public  function setCliente(){ 
            if($_POST){
                if(empty($_POST['txtnombrec'])||empty($_POST['txtapellidosc'])||empty($_POST['txtnumero'])||empty($_POST['txtcorreo'])||empty($_POST['txtcalle'])||
                empty($_POST['txtnumCasa'])||empty($_POST['txtcolonia'])||empty($_POST['txtEdo']) || empty($_POST['txtfechaR']))
                {
                    $arrResponse=array("status" => false, "msg"=>'Datos Incorrectos');
                }else{
                    $idCliente = intval($_POST['idCliente']);
                    $strNombre= ucwords(strClean($_POST['txtnombrec']));
                    $strApellidos=ucwords(strClean($_POST['txtapellidosc']));
                    $intTelefono=strClean($_POST['txtnumero']);
                    $strCorreo=ucwords(strClean($_POST['txtcorreo']));
                    $strCalle=ucwords(strClean($_POST['txtcalle']));
                    $strnumCasa=(strClean($_POST['txtnumCasa']));
                    $strColonia=ucwords(strClean($_POST['txtcolonia']));
                    $strEdo=ucwords(strClean($_POST['txtEdo']));
                    
                    $strFechaR=strClean($_POST['txtfechaR']);
                    $foto   	 	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$imgPortada 	= 'add.png';
					if($nombre_foto != ''){
						$imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
					}

                    if($idCliente == 0 ){
                        $option = 1;
                        $request_cliente=$this -> model->insertCliente(
                            $strNombre,
                            $strApellidos,
                            $intTelefono,
                            $strCorreo,
                            $strCalle,
                            $strnumCasa,
                            $strColonia,
                            $strEdo,
                            $imgPortada ,


                            $strFechaR);

                    }else{
                        $option = 2;
                        $request_cliente=$this -> model->updateCliente( $idCliente,
                            $strNombre,
                            $strApellidos,
                            $intTelefono,
                            $strCorreo,
                            $strCalle,
                            $strnumCasa,
                            $strColonia,
                            $strEdo,
                            $imgPortada ,
                            
                            $strFechaR);

                    }
        
                   




                
                    if($request_cliente>0)
                    {
                        if($option == 1){
                            $arrResponse=array('status' => true,'msg'=>'Datos Guardado');
                            if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }

                        }else{
                            $arrResponse=array('status' => true,'msg'=>'Datos actulizados');
                            if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }

							if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
								|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
								deleteFile($_POST['foto_actual']);
							}
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
            public function getClientes(){
                $arrData = $this->model->selectClientes();
                for ($i=0; $i < count($arrData); $i++) {
        
                    if($arrData[$i]['estatus'] == 1)
                    {
                        $arrData[$i]['estatus'] = '<span class="badge badge-success">Activo</span>';
                    }else{
                        $arrData[$i]['estatus'] = '<span class="badge badge-danger">Inactivo</span>';
                    }
        
                    $arrData[$i]['options'] = '<div class="text-center">
                    <button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewCliente('.$arrData[$i]['id_cliente'].')" title="Ver usuario"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditCliente('.$arrData[$i]['id_cliente'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelCliente('.$arrData[$i]['id_cliente'].')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>
                    </div>';
                }
                echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
                die();
            }
            public function getCliente(int $idclientes){
			
                $idcliente = intval($idclientes);
                if($idcliente > 0)
                {
                    $arrData = $this->model->selectCliente($idcliente);
                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrData['url_portada'] = media().'/img/uploads/'.$arrData['imagen'];
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
                die();
            }
            public function delCliente()
		{
			if($_POST){
				$intIdpersona = intval($_POST['idCliente']);
				$requestDelete = $this->model->deleteCliente($intIdpersona);
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

        public function getSelectClientes()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectNombresClientes();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['estatus'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_cliente'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}
}

                  
        
    