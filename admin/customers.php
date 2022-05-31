<?php
$title = 'Customers';
require 'parts/header.php';

try {
    $stmt = $conn->prepare("SELECT * FROM customers");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $customers = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "<h1>Query Error: " . $e->getMessage() . "</h1>";
}
?>

<div class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>
        <a class="btn btn-primary" href="/admin/add-customer.php">Add Customer</a>
    </div>
    <table class="table table-striped table-sm">
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach ($customers as $customer) : ?>

            <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= $customer['firstname'] ?></td>
                <td><?= $customer['lastname'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td>
                    <a class="btn btn-success" href="/admin/show-customer.php?id=<?= $customer['id'] ?>">Show</a>
                    <a class="btn btn-primary" href="/admin/edit-customer.php?id=<?= $customer['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="/admin/delete-customer.php?id=<?= $customer['id'] ?>">Delete</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>
</div>

<?php
require 'parts/footer.php';
