<?php
class Citas extends Controllers
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function Citas()
    {
        $data['page_tag'] = "Citas";
        $data['page_title'] = "CITAS <small>Agenda Digital </small>";
        $data['page_name'] = "citas";
        $data['page_functions']="functions_citas.js";
        $this->views->getView($this, "citas", $data);
    }
    
    public function setCitas()
    {
        if ($_POST) {
            if (empty($_POST['listidclientesc'])||empty($_POST['listidusuariosc'])||empty($_POST['fechacitasI'])||empty($_POST['fechacitasF'])
                ||empty($_POST['comentarios'])  ||empty($_POST['medioC']) ||empty($_POST['color'])) {
                $arrResponse=array("status" => false, "msg"=>'Datos Incorrectos');
            } else {
                $idcitas = intval($_POST['idcitas']);
                $strNombre= intval(strClean($_POST['listidclientesc']));
                $strUsuarios=intval(strClean($_POST['listidusuariosc']));
                $strfechai=ucwords(strClean($_POST['fechacitasI']));
                $strfechaf = ucwords(strClean($_POST['fechacitasF']));
                $strcomentarios= ucwords(strClean($_POST['comentarios']));
                $strmedioC=ucwords(strClean($_POST['medioC']));
                //$intmonto=ucwords(strClean($_POST['txtmonto']));
                $strcolor=(strClean($_POST['color']));
        
                    
                     
                if ($idcitas == 0) {
                    $option = 1;
    
                    $request_cliente=$this -> model->insertCitas(
                        $strNombre,
                        $strUsuarios,
                        $strfechai,
                        $strfechaf,
                        $strcomentarios,
                        $strmedioC,
    
                                //$intmonto,
                                $strcolor
                    );
                } else {
                    $option = 2;
                    $request_cliente=$this -> model->updatecita(
                        $idcitas,
                        $strNombre,
                        $strUsuarios,
                        $strfechai,
                        $strfechaf,
                        $strcomentarios,
                        $strmedioC,

                            //$intmonto,
                            $strcolor
                    );
                }
    
    
    
    
                
                if ($request_cliente>0) {
                    if ($option == 1) {
                        $arrResponse=array('status' => true, 'msg'=>'Datos Guardado');
                    } else {
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                    }
                } elseif ($request_cliente=='exist') {
                    $arrResponse=array('status' => false, 'msg'=>'Datos Repetidos');
                } else {
                    $arrResponse=array("status" => false, "msg"=>'No es posible guardar datos');
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delCitasC()
    {
        if ($_POST) {
            $intCitaM = intval($_POST['idcitas']);
            $requestDelete = $this->model->delec($intCitaM);
            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la cita');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la cita.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function listar()
    {
        $array = $this->model->listarCitas();
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }
}
