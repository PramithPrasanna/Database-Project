<?php
    // Connecting to mysql server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output Connection Failed if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    $query = "select * from Team_Project";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Project Data Table</title>
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

    <h1>Team Project Data Table</h1>

    <table>
        <tr>
            <th>Team Name</th>
            <th>Project Name</th>
        </tr>

        <?php 
                                    
            while($row=mysqli_fetch_assoc($result)) {
                $Team = $row['Team_Name'];
                $Project = $row['Project_Name'];
        ?>
        <tr>
            <td><?php echo $Team ?></td>
            <td><?php echo $Project ?></td>
        </tr>        
        <?php 
            }  
        ?>                      

    </table>

    <div class="btn-container">
        <a href="../home.html" class="btn-home">Back to Home</a>
        <a href="../add_team_project.html" class="btn-add-employee">Add Team Project</a>
    </div>

</body>
</html>
