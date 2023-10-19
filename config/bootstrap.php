<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once "$root/classes/SQL.php";
require_once "$root/classes/Utilities.php";

$db = new SQL('northwind');
$GLOBALS['DB'] = $db->dbConnect();
$db->dbCreateNorthwind();
