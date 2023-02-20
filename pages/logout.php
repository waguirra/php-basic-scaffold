<!-- Includes -->
<?php include_once PATH_ROOT . '/tsw/restrict.php'; ?>
<!-- ./Includes -->

<?php
unset($_SESSION['user']);
header('Location: /login');