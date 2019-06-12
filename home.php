<?php
session_start();
include (login.php);
include (register.php);
$_SESSION['id'] = $id;
