<?php
class Roles extends Controllers{
    public function __construct(){
        parent::__construct();

    }
    public function Roles(){
        $data['page_id'] = 2;
        $data['page_tag'] = "Roles Usuario";
        $data['page_name'] = "rol_usuario";
        $data['page_title'] = "Roles User <small>Agenda Digital </small>";
       

        $this->views->getView($this,"roles", $data);
    }    
}
?>