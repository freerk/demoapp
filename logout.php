<?php
require_once('include/load.php');
unset($_SESSION['username']);
header('Location: index.php');
