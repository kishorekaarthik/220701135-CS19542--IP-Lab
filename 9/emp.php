<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "employee_details");

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Insert Query
$sql_insert = "INSERT INTO employee(empid, ename, desig, dept, doj, salary) 
               VALUES (101, 'Maha', 'Manager', 'HR', '2024-08-23', 200000)";

if ($conn->query($sql_insert) === TRUE) {
    echo "Inserted record successfully<br>";
} else {
    echo "Error inserting record: " . $conn->error . "<br>";
}

// Retrieve Query
$sql_retrieve = "SELECT empid, ename, desig, dept, doj, salary FROM employee";
$result = $conn->query($sql_retrieve);

if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["empid"]. " - Name: " . $row["ename"]. " - Designation: " . $row["desig"]. " - Department: " . $row["dept"]. " - Date of Joining: " . $row["doj"]. " - Salary: " . $row["salary"]. "<br>";
    }
} else {
    echo "0 results<br>";
}

// Update Query
$sql_update = "UPDATE employee SET salary = 250000 WHERE empid = 101";

if ($conn->query($sql_update) === TRUE) {
    echo "Record updated successfully<br>";
} else {
    echo "Error updating record: " . $conn->error . "<br>";
}





$conn->close();
?>
