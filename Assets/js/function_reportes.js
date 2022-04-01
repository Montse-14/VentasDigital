
function fntSearchVMes(){
    let fecha = document.querySelector(".ventasMes").value;
    if(fecha == ""){
        swal("", "Seleccione mes y año" , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ? 
            new XMLHttpRequest() : 
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Dashboard/ventasMes';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('fecha',fecha);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaMes").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}