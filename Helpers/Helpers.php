<?php
    function base_url() {
        return BASE_URL;
    }

    function media(){
        return BASE_URL."/Assets";
        
    }
    function headerAdmin($data="")
    {
        $view_header="Views/Template/header_Admin.php";
        require_once($view_header);
    }
    function footerAdmin($data="")
    {
        $view_footer="Views/Template/footer_Admin.php";
        require_once($view_footer);
    }
    function footerAdmin_DerechosA($data="")
    {
        $view_derechosA="Views/Template/footerAdmin_DerechosA.php";
        require_once($view_derechosA);
    }
    function profileAdmin($data="")
    {
        $view_profile="Views/Template/profile_Admim.php";
        require_once($view_profile);
    }
    
    
    
    // function navAdmin($data="")
    // {
    //     $view_footer="Views/Template/nav_Admin.php";
    //     require_once($view_footer);
    // }
    //Muestra infromacion formateada
    function dep($data){
        $format  =  print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('<pre>');
        return $format;
    }
    function sessionUser(int $idpersona){
        require_once ("Models/LoginModel.php");
        $objLogin = new LoginModel();
        $request = $objLogin->sessionLogin($idpersona);
        return $request;
    }
    function uploadImage(array $data, string $name){
        $url_temp = $data['tmp_name'];
        $destino    = 'Assets/img/uploads/'.$name;        
        $move = move_uploaded_file($url_temp, $destino);
        return $move;
    }
    function deleteFile(string $name){
        unlink('Assets/img/uploads/'.$name);
    }


    function getModal(string $nameModal, $data){
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once $view_modal;
    }

    //Elemina exceso de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string);//Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); //Elimina las \ invertidas
        $string = str_ireplace("<script>","", $string);
        $string = str_ireplace("</script>","", $string);
        $string = str_ireplace("<script src>","", $string);
        $string = str_ireplace("<script type=>","", $string);
        $string = str_ireplace("SELECT * FROM","", $string);
        $string = str_ireplace("DELETE FROM","", $string);
        $string = str_ireplace("INSERT INTO","", $string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","", $string);
        $string = str_ireplace("OR '1'='1'","", $string);
        $string = str_ireplace("OR '1'='1'","",$string);
        $string = str_ireplace("OR ´1´=´1´","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","", $string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","", $string);
        $string = str_ireplace("==", "", $string);
        
        return $string;


    }
    function passGenerator($length=10){
        $pass = "";
        $longitudpass = $length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWYZabcdefghijklmnsopqrstvwxz1234567890";
        $longitudcadena =strlen($cadena); 

        for($i = 1; $i<=$longitudpass; $i++){
            $pos = rand(0,$longitudcadena-1);
            $pass .= substr($cadena, $pos, 1);
        }
        return $pass;


    }
    function token(){

        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1 . '_'. $r2 .'_'. $r3 .'_'. $r4;
        return $token;

    }
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;

    }

?>