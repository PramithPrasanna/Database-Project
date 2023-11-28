<?php
    // Connecting to mysql server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output Connection Failed if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    $employeeID = $_POST['employeeId'];
    $name = $_POST['name'];

    // SQL query to check if a record with the given ID and name exists
    $checkQuery = "SELECT * FROM Employee WHERE Employee_ID = ? AND Name = ?";

    // Prepare the statement
    $stmt = $con->prepare($checkQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('ss', $employeeID, $name);

        // Execute the statement
        $stmt->execute();

        // Store the result
        $stmt->store_result();

        // Check if any rows are returned
        if ($stmt->num_rows > 0) {
            header("Location: home.html");
        } else {
            header("Location: login.php?error=invalid_credentials");
            exit();
        }

        // Close the statement
            $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }

    // Close the database connection
    $con->close();
?>