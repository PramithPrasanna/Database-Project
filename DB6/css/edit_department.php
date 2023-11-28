<?php
    // Connecting to MySQL server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output "Connection Failed" if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    // Check if Business Line parameter is set in the URL
    if(isset($_GET['business_line'])) {
        $businessLine = $_GET['business_line'];

        // Fetch the data for the selected Business Line
        $query = "SELECT * FROM Department WHERE Business_Line = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $businessLine);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Close the statement
        $stmt->close();
    } else {
        // Redirect to the department table if Business Line is not set
        header("Location: tables/department_table.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <form action="update_department.php" method="post">
        <input type="hidden" name="businessLine" value="<?php echo $row['Business_Line']; ?>">

        <label for="businessLine">Business Line:</label>
        <div id="businessLine" class="non-editable"><?php echo $row['Business_Line']; ?></div>
        <br>

        <label for="region">Region:</label>
        <input type="text" id="region" name="region" value="<?php echo $row['Region']; ?>" required>

        <button type="submit">Submit</button>
    </form>


</body>
</html>
