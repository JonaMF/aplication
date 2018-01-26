<?php session_start(); if(!isset($_SESSION['start'])) : ?>

<?php include HTML_DIR . 'overall/header.php'; ?>

<body>

<?php include HTML_DIR . 'overall/topnav.php'; ?>

<?php include HTML_DIR . 'overall/body.php'; ?>

<?php  include HTML_DIR . 'overall/footer.php'; ?>

</body>
</html>

<?php else : header('location:index.php?action=admin'); endif; ?>