<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once "$root/classes/SQL.php";
require_once "$root/classes/Utilities.php";

$db = new SQL('northwind');
$balticDb = $db->dbConnect();
$db->dbCreateNorthwind();
