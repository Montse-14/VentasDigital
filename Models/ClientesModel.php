<?php

    class ClientesModel extends Mysql
    {
        private $intIdCliente;
        private $strNombre;
        private $strApellidos;
        private $strTelefono;
        private $strCorreo;
		private $strCalle;
		private $strnumCasa;
		private $strColonia;
		private $strEdo;
		private $strImg;
        private $strFecha;
        // private $strStatus;
        public function __construct()
        {
            parent::__construct();
        }
        public function insertCliente(string $nombre, string $apellidos, string $telefono, string $correo,
		string $Calle,string $numCasa,string $Colonia, 
		string $Edo,string $Img,string $fecha)
        {
            $this->strNombre = $nombre;
            $this->strApellidos=$apellidos;
            $this->strTelefono=$telefono;
            $this->strCorreo=$correo;
			$this->strCalle=$Calle;
			$this->strnumCasa=$numCasa;
			$this->strColonia=$Colonia;
			$this->strEdo=$Edo;
			$this->strImg=$Img;
            $this->strFecha=$fecha;
            $return = 0;
            $sql = "SELECT * FROM clientes WHERE
            telefono = '{$this->strTelefono}'";
            $request = $this->select_all($sql);

            if (empty($request)) {
                $query_insert  = "INSERT INTO clientes(nombre,apellidos,telefono,correo,calle,numero_casa,colonia,estado,imagen,fecha_registro) 
								  VALUES(?,?,?,?,?,?,?,?,?,?)";
                $arrData = array($this->strNombre,
                $this->strApellidos,
                $this->strTelefono,
                $this->strCorreo,
				$this->strCalle,
				$this->strnumCasa,
				$this->strColonia,
				$this->strEdo,
			    $this->strImg,
                $this->strFecha
                                );
                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;
            } else {
                $return = "exist";
            }
            return $return;
        }



        //consulta para mostrar datos en tabla
        public function selectClientes()
        {
            $sql = "SELECT id_cliente ,nombre, apellidos, telefono,correo,imagen, fecha_registro,estatus
                FROM clientes
                WHERE estatus != 0 ";
            $request = $this->select_all($sql);
            return $request;
        }
        public function selectCliente(int $idpersona){
			$this->intIdCliente = $idpersona;
			$sql = "SELECT id_cliente, nombre, apellidos, telefono,correo, calle, numero_casa,colonia, estado,imagen,fecha_registro, estatus 
			 FROM clientes WHERE id_cliente = $this->intIdCliente";
			$request = $this->select($sql);
			return $request;
		}
		

        public function updateCliente(int $idCliente, string $nombre, string $apellido, string $telefono, string $Correo, string $Calle,string $numCasa,string $Colonia,string $Edo,string $imagen, string $fechaR){

			

			$sql = "SELECT * FROM clientes WHERE (telefono = '{$this->strTelefono}' AND id_cliente != $this->intIdCliente)";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				if($this->strCorreo  != "")
				{
					$sql = "UPDATE clientes SET  nombre=?, apellidos=?,telefono=?, correo=?, calle =?, numero_casa = ?, colonia=?, estado=?, imagen = ?,   fecha_registro=?
							WHERE id_cliente = $this->intIdCliente  ";
					$arrData = array(
						
						        // $this->intIdCliente,
								$this->strNombre,
								$this->strApellidos,
								$this->strTelefono ,
								$this->strCorreo,
								$this->strCalle,
								$this->strnumCasa, 
								$this->strColonia, 
								$this->strEdo, 
							    $this->strImg,      
								$this->strFechaR,
	        						
	        						);
				}
				
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}

        public function deleteCliente(int $intIdpersona)
		{
			$this->intIdCliente = $intIdpersona;
			$sql = "UPDATE clientes SET estatus = ? WHERE id_cliente = $this->intIdCliente ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function selectNombresClientes()
		{
			
			$sql = "SELECT * FROM clientes WHERE estatus != 0";
			$request = $this->select_all($sql);
			return $request;
		}
    }
