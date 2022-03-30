<?php

    class CitasModel extends Mysql
    {
        private $intidCitas;
        private $strNombre;
        private $strUsuario;
        private $strFechaI;
        private $strFechaF;
		private $strComentarios;
		private $strmedio;
		private $strColor;
	
        public function __construct()
        {
            parent::__construct();
        }
        public function insertCitas(int $nombre, int $usuarios, string $fechai, string $fechaf,
		string $comentarios,string $medioc,string $Color)
        {
            $this->strNombre = $nombre;
            $this->strUsuario=$usuarios;
            $this->strFechaI=$fechai;
            $this->strFechaF=$fechaf;
			$this->strComentarios=$comentarios;
			$this->strmedio=$medioc;
			$this->strColor=$Color;
			
            $return = 0;
            // $sql = "SELECT * FROM citas WHERE
            // telefono = '{$this->strTelefono}'";
            // $request = $this->select_all($sql);

            // if (empty($request)) {
                $query_insert  = "INSERT INTO citas(id_cliente,id_usuario,fecha_inicio,fecha_final,comentarios,tipo_contacto,color) 
								  VALUES(?,?,?,?,?,?,?)";
                $arrData = array(
                $this->strNombre,
                $this->strUsuario,
                $this->strFechaI,
                $this->strFechaF,
                $this->strComentarios,
                $this->strmedio,
                $this->strColor
                                );
                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;
            // } else {
            //     $return = "exist";
            // }
            return $return;
        }
        public function updatecita(int $idcita,int $nombre, int $usuarios, string $fechai, string $fechaf,
		string $comentarios,string $medioc,string $Color){
            $this->intidCitas = $idcita;
            $this->strNombre = $nombre;
            $this->strUsuario=$usuarios;
            $this->strFechaI=$fechai;
            $this->strFechaF=$fechaf;
			$this->strComentarios=$comentarios;
			$this->strmedio=$medioc;
			$this->strColor=$Color;
			
            
            if ($this->intidCitas  != "") {
                $sql = "UPDATE citas SET  id_cliente=?, id_usuario = ?, fecha_inicio=?,  fecha_final=?, comentarios=?, tipo_contacto= ?, color = ?
							WHERE id_cita = $this->intidCitas";
                $arrData = array(
                    $this->strNombre,
                    $this->strUsuario,
                    $this->strFechaI,
                    $this->strFechaF,
                    $this->strComentarios,
                    $this->strmedio,
                    $this->strColor
                );
            }

            $request = $this->update($sql, $arrData);
            return $request;
        }
        public function delec(int $intidcita){
            $this->intidC = $intidcita;
            $sql = "DELETE FROM citas WHERE id_cita = $this->intidC";
            $request= $arrData = array(0);
            $this->eliminar($sql, $arrData);
            return $request;

        }
        
   
        public function listarCitas(){
            $sql = "SELECT id_cita  as id ,id_cliente,id_usuario,comentarios AS title,fecha_inicio AS start,fecha_final AS end, color FROM citas";
			$request = $this->select_all($sql);
			return $request;
        }

    }