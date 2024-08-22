<?php

$conn = new mysqli("localhost", "root", "", "employees");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empid = $_POST["empid"];
    $ename = $_POST["ename"];
    $desig = $_POST["desig"];
    $dept = $_POST["dept"];
    $doj = $_POST["doj"];
    $salary = $_POST["salary"];

    $sql = "INSERT INTO EMPDETAILS (EMPID, ENAME, DESIG, DEPT, DOJ, SALARY) 
            VALUES ('$empid', '$ename', '$desig', '$dept', '$doj', '$salary')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=true");
        exit();
    } else {
        $successMessage = "Error: " . $conn->error;
    }
}


if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $successMessage = "Employee added successfully!";
}

$result = $conn->query("SELECT * FROM EMPDETAILS");

while($row = $result->fetch_assoc()) {
    echo "EMPID: " . $row["EMPID"] . " - Name: " . $row["ENAME"] . 
         " - Designation: " . $row["DESIG"] . " - Dept: " . $row["DEPT"] . 
         " - DOJ: " . $row["DOJ"] . " - Salary: " . $row["SALARY"] . "<br>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Add Employee</h2>
<form method="post">
  EMPID: <input type="text" name="empid" required><br><br>
  Name: <input type="text" name="ename" required><br><br>
  Designation: <input type="text" name="desig" required><br><br>
  Department: <input type="text" name="dept" required><br><br>
  DOJ: <input type="date" name="doj" required><br><br>
  Salary: <input type="text" name="salary" required><br><br>
  <input type="submit" value="Add Employee">
</form>

<?php if (!empty($successMessage)): ?>
    <p><?php echo $successMessage; ?></p>
<?php endif; ?>

</body>
</html>
