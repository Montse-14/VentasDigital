<?php
class VentasproductosModel extends Mysql
{ 
        private $idventapro;
        private $idproductos;    
        private $idventas;
        private $intcantidad;
        private $intcostoU;
        private $inttotal;
        

    public function __construct()
    {
        parent::__construct();
    }
    public function insertVentaProductos(int $idproductos ,int $idventas, int $cantidad, int $costoU, int $total)
    {
         $this->idproductos = $idproductos;
         $this->idventas=$idventas;
         $this->intcantidad= $cantidad;
         $this->intcostoU=  $costoU;
         $this->inttotal =$total;
     
        
         $return=0;

        //consulta
        //  $sql= "SELECT*FROM clientes WHERE
        //  nombre='{$this->strNombre}' or telefono = '{$this->strTelefono}'";
        //  $request=$this->select_all($sql);
         //Validar Para Almacenar
         if(empty($request))
         {
             $query_insert="INSERT INTO ventas_productos (
                 id_producto,id_venta,cantidad,costo_unitario,total)
                 VALUES(?,?,?,?,?)";
                 $arrData= array (
                    $this->idproductos,
                    $this->idventas,
                    $this->intcantidad,
                    $this->intcostoU,
                    $this->inttotal
                    
                  
                 );
                 $request_insert= $this->insert ($query_insert,$arrData);
                 $return= $request_insert;
         }else{
             $return="exist";
         }
         return $return;
    }
    public function updateVentaProductos(int $idventapro,int $idproductos ,int $idventas, int $cantidad, int $costoU, int $total)
    {
        $this->idventapro= $idventapro;
        $this->idproductos = $idproductos;
         $this->idventas=$idventas;
         $this->intcantidad= $cantidad;
         $this->intcostoU=  $costoU;
         $this->inttotal =$total;

        // $sql = "SELECT * FROM ventas_productos WHERE ()";
        // $request = $this->select_all($sql);

        // if (empty($request)) {
            if ($this->idproductos  != "") {
                $sql = "UPDATE ventas_productos SET  id_producto=?, id_venta=?,  cantidad=?, costo_unitario=?, total = ?
							WHERE id_ventapro = $this->idventapro";
                $arrData = array(
                    $this->idproductos,
                    $this->idventas,
                    $this->intcantidad,
                    $this->intcostoU,
                    $this->inttotal
                );
            }

            $request = $this->update($sql, $arrData);
        // } else {
        //     $request = "exist";
        // }
        return $request;
    }
    //ver
    public function selectventaProducto(int $idventapro){
        $this->intventaProducto = $idventapro;
        $sql = "SELECT id_ventapro,nombre,concepto,cantidad,costo_unitario,ventas_productos.total FROM ventas 
        INNER JOIN ventas_productos on ventas.id_venta = ventas_productos.id_venta 
        INNER JOIN productos on productos.id_producto = ventas_productos.id_producto
        WHERE ventas_productos.id_ventapro = $this->intventaProducto";
                $request = $this->select($sql);
                return $request;
    }
//editar - corrigiendo
    public function selectventaaProducto(int $idventapro){
        $this->intventaProducto = $idventapro;
        $sql = "SELECT nombre,concepto,cantidad,costo_unitario,ventas_productos.total FROM ventas 
        INNER JOIN ventas_productos on ventas.id_venta = ventas_productos.id_venta 
        INNER JOIN productos on productos.id_producto = ventas_productos.id_producto
        WHERE ventas_productos.id_ventapro  = $this->intventaProducto";
                $request = $this->select($sql);
                return $request;
    }

    public function selecVnetasProductos(){
        $sql = "SELECT id_ventapro,nombre,concepto,cantidad,costo_unitario,ventas_productos.total FROM ventas 
            INNER JOIN ventas_productos on ventas.id_venta = ventas_productos.id_venta 
            INNER JOIN productos on productos.id_producto = ventas_productos.id_producto";
					$request = $this->select_all($sql);
					return $request;
    }
    public function deleteVentaP(int $intVentaPro){
        $this->intVenP = $intVentaPro;
        $sql = "DELETE FROM ventas_productos WHERE id_ventapro = $this->intVenP";
        $arrData = array(0);
        $request = $this->eliminar($sql, $arrData);
        return $request;

    }
}
