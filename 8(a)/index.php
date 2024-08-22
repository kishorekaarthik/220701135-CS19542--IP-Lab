<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function displayCustomerInfo($customer_id) {
    global $conn;
    $sql = "SELECT * FROM CUSTOMER WHERE Customer_ID = '$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Customer ID: " . $row["Customer_ID"]. " - Name: " . $row["Customer_Name"]. "<br>";
        }
    } else {
        echo "No customer found with Customer ID: $customer_id<br>";
    }
}

function displayAccountInfo($account_no) {
    global $conn;
    $sql = "SELECT * FROM ACCOUNT WHERE Account_NO = '$account_no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Account No: " . $row["Account_NO"]. " - Type: " . $row["Account_Type"]. " - Balance: " . $row["BALANCE"]. " - Customer ID: " . $row["Customer_ID"]. "<br>";
        }
    } else {
        echo "No account found with Account No: $account_no<br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addCustomer'])) {
    $customer_id = $_POST["customer_id"];
    $customer_name = $_POST["customer_name"];

    $sql = "INSERT INTO CUSTOMER (Customer_ID, Customer_Name) VALUES ('$customer_id', '$customer_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New customer created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addAccount'])) {
    $account_no = $_POST["account_no"];
    $account_type = strtoupper($_POST["account_type"]);
    $balance = $_POST["balance"];
    $customer_id = $_POST["customer_id"];

    if ($account_type != 'S' && $account_type != 'C' && $account_type != 's' && $account_type != 'c') {
        echo "Invalid account type. Please enter 'S' for Savings or 'C' for Current.<br>";
    } else {
        $sql = "INSERT INTO ACCOUNT (Account_NO, Account_Type, BALANCE, Customer_ID) VALUES ('$account_no', '$account_type', '$balance', '$customer_id')";

        if ($conn->query($sql) === TRUE) {
            echo "New account created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['displayCustomer'])) {
    $customer_id = $_GET["customer_id"];
    displayCustomerInfo($customer_id);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['displayAccount'])) {
    $account_no = $_GET["account_no"];
    displayAccountInfo($account_no);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Add Customer</h2>
<form method="post">
  Customer ID: <input type="text" name="customer_id" required><br><br>
  Customer Name: <input type="text" name="customer_name" required><br><br>
  <input type="submit" name="addCustomer" value="Add Customer">
</form>

<h2>Add Account</h2>
<form method="post">
  Account Number: <input type="text" name="account_no" required><br><br>
  Account Type (S/C): <input type="text" name="account_type" required><br><br>
  Balance: <input type="text" name="balance" required><br><br>
  Customer ID: <input type="text" name="customer_id" required><br><br>
  <input type="submit" name="addAccount" value="Add Account">
</form>

<h2>Display Customer Info</h2>
<form method="get">
  Customer ID: <input type="text" name="customer_id" required><br><br>
  <input type="submit" name="displayCustomer" value="Display Customer">
</form>

<h2>Display Account Info</h2>
<form method="get">
  Account Number: <input type="text" name="account_no" required><br><br>
  <input type="submit" name="displayAccount" value="Display Account">
</form>

</body>
</html>
