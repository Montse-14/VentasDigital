<div class="modal fade" id="modalformadduser" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
     <div class="modal-header">
       <div style="color:black" class="mx-auto">
         Formulario nuevo usuario
       </div>
     </div>
     <br>
     <h3 style="color:black" class="text-center title-2" id="titleModalUsuario">Agregar nuevo usuario</h3>
     <br>
 
     <div class="container">
       <form id="formAdduser" name="formAdduser">
         <input id="idusuario" name="idusuario" type="hidden" class="form-control" value="">
 
         <div class="row">
           <div class="col-6">
             <div class="form-group">
               <label style="color:black" for="txtnombreu" class="control-label mb-1">Nombre(s)<span class="text-danger"> *</span></label>
               <input style="color:black" id="txtnombreu" name="txtnombreu" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Ingrese su nombre(s)" value="">
             </div>
           </div>
           <div class="col-6">
             <div class="form-group">
               <label style="color:black" for="txtapellidosu" class="control-label mb-1">Apellidos<span class="text-danger"> *</span></label>
               <input style="color:black" id="txtapellidosu" name="txtapellidosu" type="text" class="form-control cc-name valid" data-val="true" placeholder="Ingresar apellidos">
             </div>
           </div>
           <div class="col-6">
             <div class="form-group">
               <label style="color:black" for="txtcorreou" class="control-label mb-1">Correo electronico<span class="text-danger"> *</span></label>
               <input style="color:black" id="txtcorreou" name="txtcorreou" type="email" class="form-control " value="" placeholder="Ingrese un correo valido">
             </div>
           </div>
           <div class="col-6">
             <div class="form-group">
               <label style="color:black" for="txtpassword" class="control-label mb-1">password<span class="text-danger"> *</span></label>
               <div class="input-group">
                 <input style="color:black" id="txtpassword" name="txtpassword" type="password" class="form-control cc-cvc" value="" autocomplete="off">
               </div>
             </div>
           </div>
           <div class="col-6">
             <div class="form-group">
               <label style="color:black" for="selecttipou" class="control-label mb-1">Tipo</label>
 
               <select style="color:black" name="selecttipou" id="selecttipou" class="form-control">
                 <option value="1">Administrador</option>
                 <option value="2">Asistente</option>
 
               </select>
             </div>
           </div>
           <div class="col-6">
             <div class="form-group">
               <br>
               <button id="btnactionguardarU" type="submit" class="btn btn-info ">
                 <!-- <i class="fa fa-lock fa-lg"></i>&nbsp; -->
                 <!-- <span id="payment-button-amount">Pay $100.00</span> -->
                 <span id="btntext">Guardar Usuario</span>
               </button>
             </div>
           </div>
         </div>
 
       </form>
     </div>
 
    
 
 
   </div>
 </div>
</div>




<div class="modal fade" id="modalViewUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">    Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellidos"></td>
            </tr>
            <tr>
              <td>Correo:</td>
              <td id="celCorreo"></td>
            </tr>
            <!-- <tr>
              <td>Usuario:</td>
              <td id="celUsuario"></td>
            </tr> -->
            <tr>
              <td>Tipo:</td>
              <td id="celTipo"></td>
            </tr>
            <!-- <tr>
              <td>Tipo Usuario:</td>
              <td id="celTipoUsuario">Larry</td>
            </tr> -->
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
            <!-- <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro">Larry</td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

       

<script>
    const base_url = "<?= base_url(); ?>";
</script>