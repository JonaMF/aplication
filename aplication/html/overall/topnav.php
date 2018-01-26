<div class="base " id="navegation">
    <div class="navbar nav-justified navbar-expand-lg navbar-light">
        <div class="navbar py-3">
            <spam class="navbar-brand">Consultorio - Medical Bolívar Express C.A</spam>
        </div>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <button type="button" class="btn btn-primary mr-3">INICIO</button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- INICIAR SECCION -->
            <button type="button" class="btn btn-info mr-3" data-toggle="modal" data-target="#iniciar_seccion">INICIAR SECCIÓN</button>
            <div id="iniciar_seccion" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title ">Inicia Sección</h5>
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                     </div>
                     <div class="modal-body">
                        <?php require HTML_DIR . 'public/login.html'; ?>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- FIN INICIAR SECCION --> 

            <!-- REGISTRAR  -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#registro">REGISTRAR</button>
            <div id="registro" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title ">Regístrate</h5>
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                     </div>
                     <div class="modal-body">
                        <?php require HTML_DIR . 'public/reg.html'; ?>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
        </div>   
    </div>
</div>
