<?php
class Password extends Controllers{
    public function __construct(){
        parent::__construct();

    }
    public function Password(){
        // $data['page_id'] = 1;
        $data['page_tag'] = "Contraseña - Recuperar Contraseña";
        $data['page_title'] = "Contraseña";
        $data['page_name'] = "contraseña";
        $data['page_funtions_js'] = "funtion_contrana.js";

        $this->views->getView($this,"password", $data);
    }
   
    
}

?>