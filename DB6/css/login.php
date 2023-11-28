<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>

        <form action="process_login.php" method="post">
            <div class="input-group">
                <label for="employeeId">Employee ID:</label>
                <input type="text" id="employeeId" name="employeeId" required>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <?php
            // Check for error parameter in the URL
            if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
                echo '<p class="error-message">Invalid credentials</p>';
            }
        ?>
    </div>

</body>
</html>
