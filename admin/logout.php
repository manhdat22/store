<?php
require_once './init.php';
$session->destroy();
new Redirect($home);
?>

