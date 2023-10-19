<?php
require_once '../config/bootstrap.php';

if (!isset($_POST['company-name'])) {
    Utilities::redirect("/index.php", status: 301);
}

try {
    $companyName = $_POST['company-name'] ?? '';
    $contactName = $_POST['contact-name'] ?? '';
    $contactTitle = $_POST['contact-title'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $postal = $_POST['postal'] ?? '';
    $region = $_POST['region'] ?? '';
    $country = $_POST['country'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $fax = $_POST['fax'] ?? '';

    $GLOBALS['DB']->prepare('INSERT INTO Customers (CompanyName, ContactName, ContactTitle, Address, City, PostalCode, Region, Country, Phone, Fax) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')->execute([
        $companyName,
        $contactName,
        $contactTitle,
        $address,
        $city,
        $postal,
        $region,
        $country,
        $phone,
        $fax,
    ]);

    Utilities::redirect('/index.php', 301);
} catch (Exception $err) {
    echo $err->getMessage();
}
