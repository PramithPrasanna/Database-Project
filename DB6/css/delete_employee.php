<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Check if Employee ID parameter is set in the URL
if (isset($_GET['Employee_ID'])) {
    $employeeID = $_GET['Employee_ID'];

    // SQL query to delete data from the database
    $deleteQuery = "DELETE FROM Employee WHERE Employee_ID=?";

    // Prepare the statement
    $stmt = $con->prepare($deleteQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('s', $employeeID);

        // Execute the statement
        $stmt->execute();

        // Redirect back to the employee table or wherever you want to redirect
        header("Location: tables/employee_table.php");

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }
} else {
    // Redirect to the employee table if Employee ID is not set
    header("Location: tables/employee_table.php");
}

// Close the database connection
$con->close();
?>
