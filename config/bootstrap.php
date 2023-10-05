<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once "$root/classes/SQL.php";
require_once "$root/classes/Utilities.php";

$db = new SQL('ExDatabase10', 'Learner10', 'BalticSQL1');
$balticDb = $db->dbConnect();
