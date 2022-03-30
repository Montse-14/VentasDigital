<?php
class ProductosModel extends Mysql

	{
		private $intIdProducto;
		private $strNombre;
        private $intprecio;
		private $strdescripcion;
        private $strStatus;
       
		

		public function __construct()
		{
			parent::__construct();
		}


		public function insertProducto (string $nombre, int $precio, string $descripcion)
		{
			$this->strNombre=$nombre;
			$this->intprecio = $precio;
			$this->strdescripcion = $descripcion;
			$return = 0;

			$sql= "SELECT * FROM productos WHERE nombre='{$this->strNombre}'";
			$request=$this->select_all($sql);
			if (empty($request))
			{
				$query_insert= "INSERT INTO productos(
					nombre,precio,descripcion
				) VALUES(?,?,?)";
				$arrData= array(
					$this->strNombre,
					$this->intprecio,
					$this->strdescripcion
				);
				$request_insert=$this->insert($query_insert,$arrData);
				$return=$request_insert;
			}else{
				$return="exist";
			}
			return  $return;
		}
		public function selectProductos()
		{
			$sql = "SELECT id_producto,nombre,precio,descripcion,estatus 
            FROM `productos` 
            WHERE estatus != 0;";
					$request = $this->select_all($sql);
					return $request;
		}

		public function selectProducto(int $id_producto){
			$this->intIdProducto = $id_producto;
			$sql= "SELECT id_producto, nombre, precio, descripcion, estatus
			FROM productos 
			WHERE id_producto = $this->intIdProducto";
			$request = $this->select($sql);
			return $request;
		}
		public function updateProducto(int $idProd, string $Nombre, int $precio, string $descripcion){
			$this->intIdProducto = $idProd;
			$this->strNombre=$Nombre;
			$this->intprecio = $precio;
			$this->strdescripcion = $descripcion;
			
			$sql = "SELECT *  FROM productos WHERE (nombre = '{$this->strNombre}' and id_producto != $this->intIdProducto)";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				if($this->strNombre !="")
				{
					$sql = "UPDATE productos SET nombre=?,precio=?,descripcion=?
					WHERE id_producto=$this->intIdProducto";
					$arrData = array(
						
						$this->strNombre, 
						$this->intprecio, 
						$this->strdescripcion    
					);  
				}
				$request = $this->update($sql,$arrData);	
			}else{
				$request = "exist";
			}
			return $request;
				}

				public function deleteProducto(int $intIdProducto)
				{
					$this->intIdProducto = $intIdProducto;
					$sql = "UPDATE productos SET estatus = ? WHERE id_producto = $this->intIdProducto";
					$arrData = array(0);
					$request = $this->update($sql,$arrData);
					return $request;
				}

				public function selectNombresProductos(){
					$sql = "SELECT * FROM productos";
			$request = $this->select_all($sql);
			return $request;
				}
	}
			


?>