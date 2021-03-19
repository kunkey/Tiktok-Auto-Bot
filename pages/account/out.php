<?php
error_reporting(0);
require '../../Core.php';
use Core\System;
$kun = new System;
session_destroy();

header('Location: home');

?>
