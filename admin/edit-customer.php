<?php
$title = 'Add Customer';
require 'parts/header.php';


$id = (int) test_input($_GET['id']);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$firstname = $lastname = $email = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = test_input($_POST["firstname"]);
    $lastname = test_input($_POST["lastname"]);
    $email = test_input($_POST["email"]);

    try {
        $stmt = $conn->prepare("UPDATE customers SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$id");
        $stmt->execute();
        header('location: /admin/customers.php');
    } catch (PDOException $e) {
        echo "<h1>Query Error: " . $e->getMessage() . "</h1>";
    }
}


try {
    $stmt = $conn->prepare("SELECT * FROM customers WHERE id=$id");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $customer = $stmt->fetch();

    if (!$customer) {
        header('location: /admin/customers.php');
    }
} catch (PDOException $e) {
    echo "<h1>Query Error: " . $e->getMessage() . "</h1>";
}
?>

<div class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Customer</h1>
    </div>
    <form class="card row g-3 my-3" method="post">
        <div class="card-body row">
            <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstname" placeholder="" value="<?= $customer['firstname'] ?>" required="">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastname" placeholder="" value="<?= $customer['lastname'] ?>" required="">
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?= $customer['email'] ?>">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
        </div>
    </form>
</div>

<?php
require 'parts/footer.php';
