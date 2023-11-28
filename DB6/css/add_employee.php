<?php
    // Connecting to mysql server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output Connection Failed if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    // Get form data
    $employeeID = $_POST['employeeId'];
    $name = $_POST['name'];
    $bankAccountNumber = $_POST['bankAccountNumber'];
    $region = $_POST['region'];
    $salary = $_POST['salary'];
    $dateHired = $_POST['dateHired'];
    $role = $_POST['role'];

    // SQL query to insert data into the database
    $insertQuery = "INSERT INTO Employee (Employee_ID, Name, Bank_Account_Info, Region, Salary, Date_Hired, Role) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $con->prepare($insertQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('isisiss', $employeeID, $name, $bankAccountNumber, $region, $salary, $dateHired, $role);

        // Execute the statement
        $stmt->execute();

        // Go back to employee table
        header("Location: tables/employee_table.php");

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }

    // Close the database connection
    $con->close();

?>