<?php
class Dashboard extends Controllers{
    public function __construct(){
        parent::__construct();
        session_start();
			// session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			// getPermisos(1);

    }
    public function dashboard(){
        $data['page_id'] = 1;
        $data['page_tag'] = "Agenda Digital";
        $data['page_title'] = "Agenda Digital";
        $data['page_name'] = "agenda digital";

        $this->views->getView($this,"dashboard", $data);
    }
   
    
}

?>