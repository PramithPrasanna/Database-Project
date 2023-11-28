<?php
    // Connecting to mysql server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output Connection Failed if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    $query = "select * from Department_Team";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Team Data Table</title>
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

    <h1>Department Team Data Table</h1>

    <table>
        <tr>
            <th>Business Line</th>
            <th>Team Name</th>
        </tr>

        <?php 
                                    
            while($row=mysqli_fetch_assoc($result)) {
                $Business = $row['Business_Line'];
                $Team = $row['Team_Name'];
        ?>
        <tr>
            <td><?php echo $Business ?></td>
            <td><?php echo $Team ?></td>
        </tr>        
        <?php 
            }  
        ?>                      

    </table>

    <div class="btn-container">
        <a href="../home.html" class="btn-home">Back to Home</a>
        <a href="../add_department_team.html" class="btn-add-employee">Add Department Team</a>
    </div>

</body>
</html>
