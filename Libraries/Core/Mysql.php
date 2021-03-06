<?php
//clase myql hereda a clase conexion
class Mysql extends Conexion{

    private $conexion;
    private $strquery;
    private $arrValues;
   

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }
    //insertar
    public function insert(string $query, array $arrValues)
    {
        $this->strquery=$query;
        $this->arrValues=$arrValues;
        $insert=$this->conexion->prepare($this->strquery);
        $resInsert=$insert->execute($this->arrValues);
        if($resInsert)
        {
            $lastInsert=$this->conexion->lastInsertId();
        }else{
            $lastInsert=0;
        }
        return $lastInsert;
    }
    //buscar 
    public function select(string $query)
    {
        $this->strquery=$query;
        $result=$this->conexion->prepare($this->strquery);
        $result->execute();
        $data=$result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //dev reg
    public function select_all(string $query)
    {
        $this->strquery=$query;
        $result=$this->conexion->prepare($this->strquery);
        $result->execute();
        $data=$result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }
    //update
    public function update(string $query,array $arrValues)
    {
        
        $this->strquery=$query;
        $this->arrValues=$arrValues;
        $actualizar=$this->conexion->prepare($this->strquery);
        $resExecute = $actualizar->execute($this->arrValues);
        return $resExecute;
    }
    //eliminar
    public function eliminar(string $query)
    {
        $this->strquery=$query;
        $result=$this->conexion->prepare($this->strquery);
        
        $del= $result->execute();
        return $del;
        // $del
    }
}
?>