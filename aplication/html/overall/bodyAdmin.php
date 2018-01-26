<div class="base" id="navegation">
    <div class="navbar nav-justified navbar-expand-lg navbar-light">
        <a class="btn btn-info" href="#menu-toggle" aria-label="Skip to main navigation" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i>
        </a>
        <div class="navbar" >
            <span class="navbar-brand py-2">Administración</span>
            <span class="text-dark"><?php echo $_SESSION['start']; ?></span>
        </div>
    </div>
</div>
<div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" >
        <div class="list-group sidebar-nav">
            <a href="#" id="registrar_user" class="list-group-item"><span><i class="fa fa-pencil fa-fw"></i></span> Editar Usuarios</a>
            <a href="#" id="registrar_paciente" class="list-group-item"><span><i class="fa fa-folder-open-o"></i></span> Registrar Paciente</a>
            <a class="list-group-item" href="#" id="configurar"><span><i class="fa fa-cog fa-fw" aria-hidden="true"></i></span> Configuración</a>
            <a href="?action=logout" class="list-group-item"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span> Logout</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div id="crudo"></div>             
        </div>
    </div>
    <!-- page-content-wrapper -->
</div>
<!-- wrapper -->