<?php
    class Conexion{
        private $conect;

        //met const
        public function __construct(){
            $conectionString="mysql:hos=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            try{
                    $this->conect= new PDO($conectionString,DB_USER,DB_PASSWORD);
                    //DEtectar errores en mysql
                    $this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    //echo "Conexion exitosa";
                }catch(PDOException $e){
                    $this->conect="Error de conexion";
                    echo"ERROr: ".$e->getMessage();
            }
        }
        public function conect(){
            return $this->conect;
        }
    }
    
?>