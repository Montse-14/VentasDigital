<?php 

	class UsuariosModel extends Mysql
	{
		private $intIdUsuario;
		
		private $strNombre;
		private $strApellido;
		
		private $strEmail;
        //private $strUsuario;
		private $strPassword;
		private $strToken;
		private $intTipoId;
		

		public function __construct()
		{
			parent::__construct();
		}	

		public function insertUsuario(string $nombre, string $apellido, string $email, string $password, int $tipoid){

			
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$return = 0;

			$sql = "SELECT * FROM usuarios WHERE 
					correo = '{$this->strEmail}'  ";  //or usuario  = '{$this->strUsuario}'
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO usuarios(nombre,apellidos,correo,password,tipo) 
								  VALUES(?,?,?,?,?)";
	        	$arrData = array($this->strNombre,
        						$this->strApellido,
        						$this->strEmail,
        						//$this->strUsuario,
        						$this->strPassword,
        						
        						$this->intTipoId
        						);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = 'exist';
			}
	        return $return;
		}

		public function selectUsuarios()
		{
			$sql = "SELECT id_usuario,nombre,apellidos,correo,tipo,estatus 
            FROM `usuarios` 
            WHERE estatus != 0;";
					$request = $this->select_all($sql);
					return $request;
		}
		public function selectUsuariosDas()
		{
			$sql = "SELECT nombre,tipo,estatus 
            FROM `usuarios` 
            ";
					$request = $this->select_all($sql);
					return $request;
		}



		public function selectUsuario(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT id_usuario, nombre, apellidos, correo,tipo, estatus 
			 FROM usuarios WHERE id_usuario = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}

		public function updateUsuario(int $idUsuario, string $nombre, string $apellido, string $email, string $password, int $tipoid){

			$this->intIdUsuario = $idUsuario;
			// $this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			// $this->intTelefono = $telefono;
			$this->strEmail = $email;
			//$this->strUsuario = $usuario;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			// $this->intStatus = $status;

			$sql = "SELECT * FROM usuarios WHERE (correo = '{$this->strEmail}' AND id_usuario != $this->intIdUsuario)";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				if($this->strPassword  != "")
				{
					$sql = "UPDATE usuarios SET  nombre=?, apellidos=?,  correo=?, password=?, tipo=? 
							WHERE id_usuario = $this->intIdUsuario ";
					$arrData = array(
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->strEmail,
									//$this->strUsuario,
	        						$this->strPassword,
	        						$this->intTipoId
	        						);
				}
				// else{
				// 	$sql = "UPDATE persona SET identificacion=?, nombres=?, apellidos=?, telefono=?, email_user=?, rolid=?, status=? 
				// 			WHERE idpersona = $this->intIdUsuario ";
				// 	$arrData = array($this->strIdentificacion,
	        	// 					$this->strNombre,
	        	// 					$this->strApellido,
	        	// 					$this->intTelefono,
	        	// 					$this->strEmail,
	        	// 					$this->intTipoId,
	        	// 					$this->intStatus);
				// }
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}
		public function deleteUsuario(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE usuarios SET estatus = ? WHERE id_usuario = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function selectNombreUsuarios()
		{
			
			$sql = "SELECT * FROM usuarios WHERE estatus != 0";
			$request = $this->select_all($sql);
			return $request;
		}

	}
 ?>