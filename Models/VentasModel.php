<?php
class VentasModel extends Mysql
{
    private $fecha;
    private $intIdventa;
    private $idclieNombre;
    private $strconcepto;
    private $strdescripcion;
    private $intsubtotal ;
    private $intiva ;
    private $inttotal ;

    private $strFecha;
    
    public function __construct()
    {
        parent::__construct();
    }


    public function insertVenta(int $idclientenombre ,string $concepto, string $descripcion, int $subt, int $iva, int $total, string $Fecha)
    {
         $this->idclieNombre = $idclientenombre;
         $this->strconcepto=$concepto;
         $this->strdescripcion=$descripcion;
         $this->intsubtotal=  $subt;
         $this->intiva = $iva;
         $this->inttotal =$total;
         $this->strFecha=$Fecha;
        
         $return=0;

        //consulta
        //  $sql= "SELECT*FROM clientes WHERE
        //  nombre='{$this->strNombre}' or telefono = '{$this->strTelefono}'";
        //  $request=$this->select_all($sql);
         //Validar Para Almacenar
         if(empty($request))
         {
             $query_insert="INSERT INTO ventas (
                 id_cliente,concepto,descripcion,subtotal,iva,total,fecha_registro)
                 VALUES(?,?,?,?,?,?,?)";
                 $arrData= array (
                    $this->idclieNombre,
                    $this->strconcepto,
                    $this->strdescripcion,
                    $this->intsubtotal,
                    $this->intiva ,
                    $this->inttotal,
                    $this->strFecha
                  
                 );
                 $request_insert= $this->insert ($query_insert,$arrData);
                 $return= $request_insert;
         }else{
             $return="exist";
         }
         return $return;
    }

    public function selectVentas()
    {

        $sql = "SELECT V.id_venta ,C.nombre, V.concepto, V.descripcion, V.subtotal, V.iva,V.total,V.fecha_registro, V.estatus 
            FROM clientes C 
            INNER JOIN ventas V
             on C.id_cliente = v.id_cliente 
             WHERE V.estatus != 0;";
        $request = $this->select_all($sql);
        return $request;
    }
    //ver venta detalles
    public function selectventa(int $idventa)
    {
        $this->intcliente = $idventa;
        $sql = "SELECT V.id_venta ,C.nombre, V.concepto, V.descripcion, V.subtotal, V.iva,V.total,V.fecha_registro, V.estatus 
                    FROM ventas v 
                    INNER JOIN clientes c on c.id_cliente = v.id_cliente 
                    WHERE v.id_venta = $this->intcliente";
        $request = $this->select($sql);
        return $request;
    }



    public function updateVenta(int $idVenta, string $nombre, string $concepto, string $descripcion, int $subto, int $iva, int $total, string $fecha)
    {

        $this->intIdventa = $idVenta;
        // $this->strIdentificacion = $identificacion;
        $this->idclieNombre = $nombre;
        $this->strconcepto = $concepto;
        // $this->intTelefono = $telefono;
        $this->strdescripcion = $descripcion;
        $this->intsubtotal = $subto;
        $this->intiva = $iva;
        $this->inttota = $total;
        $this->strFecha = $fecha;
        // $this->intTipoId = $tipoid;
        // $this->intStatus = $status;

        $sql = "SELECT * FROM ventas WHERE (concepto = '{$this->strconcepto}' AND id_venta != $this->intIdventa)";
        $request = $this->select_all($sql);

        if (empty($request)) {
            if ($this->idclieNombre  != "") {
                $sql = "UPDATE ventas SET  id_cliente=?, concepto=?,  descripcion=?, subtotal=?, iva= ?, total = ?, fecha_registro=? 
							WHERE id_venta = $this->intIdventa ";
                $arrData = array(
                    $this->idclieNombre,
                    $this->strconcepto,
                    $this->strdescripcion,
                    $this->intsubtotal,
                    $this->intiva,
                    $this->inttota,
                    $this->strFecha
                    // $this->intTipoId
                );
            }

            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }
    //eliminar venta
    public function deleteVenta(int $intIdventa)
    {
        $this->intcliente = $intIdventa;
        $sql = "UPDATE ventas SET estatus = ? WHERE id_venta = $this->intcliente ";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);
        return $request;
    }
    public function selectNombresVentas()
    {

        $sql = "SELECT * FROM ventas ";
        $request = $this->select_all($sql);
        return $request;
    }

}