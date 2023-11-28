<?php
    // Connecting to MySQL server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output "Connection Failed" if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    // Get form data
    $businessLine = $_POST['businessLine'];
    $region = $_POST['region'];

    // SQL query to insert data into the database
    $insertQuery = "INSERT INTO Department (Business_Line, Region) 
                    VALUES (?, ?)";

    // Prepare the statement
    $stmt = $con->prepare($insertQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('ss', $businessLine, $region);

        // Execute the statement
        $stmt->execute();

        // Go back to the department table or wherever you want to redirect
        header("Location: tables/department_table.php");

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }

    // Close the database connection
    $con->close();
?>
