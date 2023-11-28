<?php
    // Connecting to mysql server
    $con = new mysqli('localhost', 'root', '', 'business_database');

    // Output Connection Failed if connection fails
    if ($con->connect_error) {
        die('Connection Failed');
    }

    // Values from fields in form, can have multiple
    $employeeID = $_POST['EmployeeID'];
    $name = $_POST['Name'];
    $bank = $_POST['bank'];
    $region = $_POST['region'];
    $salary = $_POST['salary'];
    $date = $_POST['date'];
    $role = $_POST['role'];

    // // Function to validate Date
    // function isDate($dateString) {
    //     $dateTime = DateTime::createFromFormat('Y-m-d', $dateString);
    //     return $dateTime && $dateTime->format('Y-m-d') === $dateString;
    // }
    

    // // Check if values are of correct type
    // if (is_string($employeeID) && is_string($name) && is_string($region) && isDate($date) && is_string($role)) {
    //     $sql = $con->.prepare("INSERT INTO Employee (Employee_ID, Name, Bank_Account_Info, Region, Salary, Date_Hired, Role)
    //     VALUES (?, ?, ?, ?, ?, ?, ?)");
    //     $sql->blind_param("isisiss", $employeeID, $name, $bank, $region, $salary, $date, $role);

    //     $sql->execute();

    //     $sql->close();

    //     // $rs  = $con->query($sql);
    //     // if ($rs) {
    //     //     printf("New record inserted successfully.");
    //     // } else {
    //     //     printf("failed")
    //     //     //header("Location: page.html");
    //     // }
        
    // } else {
    //     // If inputs are invalid, go to page that says "input invalid" and have button to reroute back to page
    //     header("Location: page.html");
    // }


    // // Check if input exists
    // $validation = "SELECT Name FROM Employee WHERE Employee_ID='$input'";
    // $stmt = $con->prepare($validation);
    // if($rs) {
    //     // If query returns empty, reroute to page that says "no results, check input" and has button to go back to input data
    //     header("Location: page.html");
    // } else {


    // }




    // $sql = "SELECT Date_Hired FROM Employee WHERE Name='$input'";

    $val = $_POST['Table'];
    $id = $_POST['EmployeeID'];

    $sql = "UPDATE $val SET Salary = 200000 WHERE Employee_ID = '$id'";
    
    // Sending query to database
    $rs  = $con->query($sql);


    if ($rs) {
        // while ($row = $rs->fetch_assoc()) {
        //     printf('Date Hired: %s', $row['Date_Hired']);
        // }
        //header("Location: page.html");
        printf("success");
        exit();    
    } else {
        printf("No Results");
    }

    $con->close();

?>