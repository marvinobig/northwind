<?php

declare(strict_types=1);
require_once './config/bootstrap.php';

$balticDb = $db->dbConnect();
$customers = $balticDb->query("SELECT * FROM Customers", PDO::FETCH_ASSOC)->fetchAll();
$cities = $balticDb->query("SELECT DISTINCT City FROM Customers", PDO::FETCH_ASSOC)->fetchAll();
$countries = $balticDb->query("SELECT DISTINCT Country FROM Customers", PDO::FETCH_ASSOC)->fetchAll();
$regions = $balticDb->query("SELECT DISTINCT Region FROM Customers", PDO::FETCH_ASSOC)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baltic: Northwind</title>
    <link rel="stylesheet" href="/assets/index.css">
    <script src="./assets/index.js" defer></script>
</head>

<body>
    <h1>Northwind Data</h1>
    <article>
        <section>
            <h2>Customers</h2>
            <button id="add-customer-btn" type="button">Add Customer</button>
        </section>
        <section id="customer-table-container">
            <table>
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Contact Name</th>
                        <th>Contact Title</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer) : ?>
                        <tr>
                            <td><?= $customer['CompanyName'] ?></td>
                            <td><?= $customer['ContactName'] ?></td>
                            <td><?= $customer['ContactTitle'] ?></td>
                            <td><?= $customer['Address'] ?></td>
                            <td><?= $customer['City'] ?></td>
                            <td><?= $customer['PostalCode'] ?></td>
                            <td><?= $customer['Country'] ?></td>
                            <td><?= $customer['Phone'] ?></td>
                            <td><?= $customer['Fax'] ?></td>
                            <td><a href="./scripts/deleteCustomer?id=<?= $customer['CustomerID'] ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php require_once './partials/addCustomerForm.php' ?>
        </section>
    </article>
</body>

</html>