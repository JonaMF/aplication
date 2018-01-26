<?php session_start(); if(isset($_SESSION['start'])) : ?>

<?php require HTML_DIR . 'overall/header.php'; ?>

<body onload="noRetro()">
    
<?php include HTML_DIR . 'overall/bodyAdmin.php'; ?>

<script src="view/bootstrap/js/popper.min.js"></script>
<script src="view/bootstrap/js/bootstrap.min.js"></script>

<script src="view/dataTables/js/jquery.dataTables.min.js"></script>
<script src="view/dataTables/js/dataTables.foundation.min.js"></script>

<script src="view/app/js/control_sidebar.js"></script>
<script src="view/app/js/front.js"></script>

</body>
</html>

<?php else : header('location:index.php'); endif; ?>