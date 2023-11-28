<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Get form data
$employeeID = $_POST['employeeID'];
$name = $_POST['name'];
$bankAccountNumber = $_POST['bankAccountNumber'];
$region = $_POST['region'];
$salary = $_POST['salary'];
$dateHired = $_POST['dateHired'];
$role = $_POST['role'];

// SQL query to update data in the database
$updateQuery = "UPDATE Employee SET Name=?, Bank_Account_Info=?, Region=?, Salary=?, Date_Hired=?, Role=? WHERE Employee_ID=?";

// Prepare the statement
$stmt = $con->prepare($updateQuery);

if ($stmt) {
    // Bind the parameters
    $stmt->bind_param('ssssssi', $name, $bankAccountNumber, $region, $salary, $dateHired, $role, $employeeID);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the employee table or wherever you want to redirect
    header("Location: tables/employee_table.php");

    // Close the statement
    $stmt->close();
} else {
    echo "Error in preparing the statement.";
}

// Close the database connection
$con->close();
?>
