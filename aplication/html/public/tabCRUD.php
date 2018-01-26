<?php require '../../core/models/CRUD.php'; ?>
<div class="card border-secondary" id="crud">
    <div class="card-header d-flex align-items-center border-secondary">
      <h3 class="h4">Registros de usuarios</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>USUARIO</th>
                    <th>CORREO</th>
                    <th>CONTRASEÑA</th>
                    <th>NIVEL</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>USUARIO</th>
                    <th>CORREO</th>
                    <th>CONTRASEÑA</th>
                    <th>NIVEL</th>
                    <th>&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                        $e = new CRUD();
                        $personas = $e->getSelect();
                        
                        foreach($personas as $persona): ?>

                    <tr id="<?php echo $persona->USUARIO ?>">
                        <td><?php echo $persona->NOMBRE ?></td>
                        <td><?php echo $persona->APELLIDO ?></td>
                        <td><?php echo $persona->USUARIO ?></td>
                        <td><?php echo $persona->CORREO ?></td>
                        <td><?php echo $persona->CONTRASENA ?></td>
                        <td><?php echo $persona->NIVEL ?></td>
                        <td><button type="button" class="btn btn-info mr-3" onclick="accion('<?php echo $persona->USUARIO ?>')">Actualizar</button></td>
                    </tr>
                
                <?php   endforeach; ?>
            <!-- modal para acciones del administrador -->
            <?php require '../../html/public/actualizar.html'; ?>
            </tbody>
        </table>
        <div >
            <input type="button" value="Nuevo Administrador" onclick="creaAdm()"/>
        </div>
            <!-- modal para crear un nuevo administrador -->
            <?php require '../../html/public/creaAdm.php'; ?>
    </div>
  </div>
</div>
<script>

$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "lengthMenu": "Ver _MENU_ registros por página",
            "zeroRecords": "Sin registros almacenados",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
        
    } );
} );
</script>