<?php
    // Connecting to MySQL server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output "Connection Failed" if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    // Check if Employee ID parameter is set in the URL
    if(isset($_GET['Employee_ID'])) {
        $employeeID = $_GET['Employee_ID'];

        // Fetch the data for the selected Employee ID
        $query = "SELECT * FROM Employee WHERE Employee_ID = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $employeeID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Close the statement
        $stmt->close();
    } else {
        // Redirect to the employee table if Employee ID is not set
        header("Location: tables/employee_table.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
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

    <form action="update_employee.php" method="post">
        <input type="hidden" name="employeeID" value="<?php echo $row['Employee_ID']; ?>">

        <label for="employeeID">Employee ID:</label>
        <div id="employeeID" class="non-editable"><?php echo $row['Employee_ID']; ?></div>
        <br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>" required>

        <label for="bankAccountNumber">Bank Account Number:</label>
        <input type="text" id="bankAccountNumber" name="bankAccountNumber" value="<?php echo $row['Bank_Account_Info']; ?>" required>

        <label for="region">Region:</label>
        <input type="text" id="region" name="region" value="<?php echo $row['Region']; ?>" required>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" value="<?php echo $row['Salary']; ?>" required>

        <label for="dateHired">Date Hired:</label>
        <input type="date" id="dateHired" name="dateHired" value="<?php echo $row['Date_Hired']; ?>" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="<?php echo $row['Role']; ?>" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>

