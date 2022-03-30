<?php 

	class Usuarios extends Controllers{
		public function __construct()
		{
			session_start();
			parent::__construct();
		}

		public function Usuarios()
		{
			$data['page_tag'] = "Usuarios";
			$data['page_title'] = "USUARIOS <small>Tienda Virtual</small>";
			$data['page_name'] = "usuarios";
			$data['page_functions_js'] = "functions_usuarios.js";
			$this->views->getView($this,"usuarios",$data);
		}

		public function setUsuario(){
			if($_POST){
				
				if(empty($_POST['txtnombreu']) || empty($_POST['txtapellidosu']) || empty($_POST['txtcorreou']) || empty($_POST['txtpassword']) || empty($_POST['selecttipou'])  )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$idUsuario = intval($_POST['idusuario']);
					$strNombre = strClean($_POST['txtnombreu']);
					$strApellidos = ucwords(strClean($_POST['txtapellidosu']));
					$strCorreo = ucwords(strClean($_POST['txtcorreou']));
					//$strUsuario = ucwords(strClean($_POST['txtusuario']));
					$strPassword = strClean($_POST['txtpassword']);
					$intTipoId = intval(strClean($_POST['selecttipou']));
					

					if($idUsuario == 0)
					{
						$option = 1;
						//$strPassword =  empty($_POST['txtpassword']) ? hash("SHA256",passGenerator()) : hash("SHA256",$_POST['txtpassword']);
						$request_user = $this->model-> insertUsuario($strNombre ,
																			
																			$strApellidos, 
																			$strCorreo, 
																			//$strUsuario,
																			$strPassword, 
																			$intTipoId
																			 );
					}else{
						$option = 2;
						//$strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
						$request_user = $this->model->updateUsuario($idUsuario,
							                                        $strNombre ,
																			
						                                            $strApellidos, 
						                                            $strCorreo, 
						                                            //$strUsuario,
						                                            $strPassword, 
						                                            $intTipoId);

					}

					if($request_user > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_user == 'exist'){
						$arrResponse = array('status' => true, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getUsuarios()
		{
			$arrData = $this->model->selectUsuarios();
			for ($i=0; $i < count($arrData); $i++) {

				if($arrData[$i]['estatus'] == 1)
				{
					$arrData[$i]['estatus'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['estatus'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				if($arrData[$i]['tipo'] == 1)
				{
					$arrData[$i]['tipo'] = '<span class="badge badge-success">Administrador</span>';
				}elseif($arrData[$i]['tipo'] == 2){
					$arrData[$i]['tipo'] = '<span class="badge badge-info">Asistente</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario('.$arrData[$i]['id_usuario'].')" title="Ver usuario"><i class="fas fa-eye"></i></button>
				<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario('.$arrData[$i]['id_usuario'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario('.$arrData[$i]['id_usuario'].')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}



		public function getUsuariosDas()
		{
			$arrData = $this->model->selectUsuariosDas();
			for ($i=0; $i < count($arrData); $i++) {

				if($arrData[$i]['estatus'] == 1)
				{
					$arrData[$i]['estatus'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['estatus'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				if($arrData[$i]['tipo'] == 1)
				{
					$arrData[$i]['tipo'] = '<span class="badge badge-success">Administrador</span>';
				}elseif($arrData[$i]['tipo'] == 2){
					$arrData[$i]['tipo'] = '<span class="badge badge-info">Asistente</span>';
				}

				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario('.$arrData[$i]['id_usuario'].')" title="Ver usuario"><i class="fas fa-eye"></i></button>
				<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario('.$arrData[$i]['id_usuario'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario('.$arrData[$i]['id_usuario'].')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getUsuario(int $idusuarios){
			
			$idusuario = intval($idusuarios);
			if($idusuario > 0)
			{
				$arrData = $this->model->selectUsuario($idusuario);
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

		public function delUsuario()
		{
			if($_POST){
				$intIdpersona = intval($_POST['idusuario']);
				$requestDelete = $this->model->deleteUsuario($intIdpersona);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => "Se ha eliminado el usuario");
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function getSelectUsuarios()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectNombreUsuarios();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['estatus'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_usuario'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}

	}
 ?>