<?php
    // Connecting to MySQL server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output "Connection Failed" if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    // Get form data
    $projectName = $_POST['projectName'];
    $projectDeadline = $_POST['projectDeadline'];
    $projectStatus = $_POST['projectStatus'];

    // SQL query to insert data into the database
    $insertQuery = "INSERT INTO Project (Name, Deadline, Status) 
                    VALUES (?, ?, ?)";

    // Prepare the statement
    $stmt = $con->prepare($insertQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('sss', $projectName, $projectDeadline, $projectStatus);

        // Execute the statement
        $stmt->execute();

        // Go back to the project table or wherever you want to redirect
        header("Location: tables/project_table.php");

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }

    // Close the database connection
    $con->close();
?>
