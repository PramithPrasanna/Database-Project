<?php
    // Connecting to mysql server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output Connection Failed if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    $query = "select * from Employee";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-container {
            margin-top: 20px;
            text-align: center;
        }

        .btn-home {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-add-employee {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Employee Data Table</h1>

    <table>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Bank Account Number</th>
            <th>Region</th>
            <th>Salary</th>
            <th>Date Hired</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php 
                                    
            while($row=mysqli_fetch_assoc($result)) {
                $Employee = $row['Employee_ID'];
                $Name = $row['Name'];
                $Bank = $row['Bank_Account_Info'];
                $Region = $row['Region'];
                $Salary = $row['Salary']; 
                $Date = $row['Date_Hired'];
                $Role = $row['Role'];
        ?>
        <tr>
            <td><?php echo $Employee ?></td>
            <td><?php echo $Name ?></td>
            <td><?php echo $Bank ?></td>
            <td><?php echo $Region ?></td>
            <td><?php echo $Salary ?></td>
            <td><?php echo $Date ?></td>
            <td><?php echo $Role ?></td>
            <td><a href="../edit_employee.php?Employee_ID=<?php echo $row['Employee_ID']; ?>" class="btn btn-pencil">Edit</a></td>
            <td><a href="../delete_employee.php?Employee_ID=<?php echo $row['Employee_ID']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>        
        <?php 
            }  
        ?>                      

    </table>

    <div class="btn-container">
        <a href="../home.html" class="btn-home">Back to Home</a>
        <a href="../add_employee.html" class="btn-add-employee">Add Employee</a>
    </div>

</body>
</html>
