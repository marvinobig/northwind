<?php
require_once '../config/bootstrap.php';

if (!isset($_GET['id'])) {
    Utilities::redirect("/index.php", status: 403);
}

try {
    $customerID = $_GET['id'] ?? '';
    $balticDb->prepare('DELETE FROM Customers WHERE CustomerID = ?')->execute([$customerID]);

    Utilities::redirect('/index.php', 301);
} catch (Exception $err) {
    echo $err->getMessage();
}
