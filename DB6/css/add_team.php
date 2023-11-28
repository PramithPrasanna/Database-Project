<?php
    // Connecting to MySQL server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output "Connection Failed" if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    // Get form data
    $teamName = $_POST['teamName'];
    $managerID = $_POST['managerId'];

    // SQL query to insert data into the database
    $insertQuery = "INSERT INTO Team (Team_Name, Manager_ID) 
                    VALUES (?, ?)";

    // Prepare the statement
    $stmt = $con->prepare($insertQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('si', $teamName, $managerID);

        // Execute the statement
        $stmt->execute();

        // Go back to the team table or wherever you want to redirect
        header("Location: tables/team_table.php");

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }

    // Close the database connection
    $con->close();
?>
