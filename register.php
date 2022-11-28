<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>

<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="register.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
    </head>
    <body>
        <ul id="nav">
            <h1>Arizona Crime Data</h1>
        </ul>
        <h1 style="text-align:center; margin-top:110px; font-family: 'Roboto Mono', monospace;"><b>Create an Account</b></h1>
        <form method="post" action="" name="signup-form" onsubmit="SubmitCode();">
            <div id="registerdiv">
                <table>
                    <tr>
                        <td>
                            <p>Username</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Email</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="email" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Password</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="password" required />
                        </td>
                    </tr>
                </table>
            </div>
            <p id="account-create-msg"></p>
            <p class="button">
                <button type="submit" name="register" value="register">Register</button>
            </p>
        </form>
        <p id="back-to-login-btn"><a href="loginpage.php">Back to Login</a></p>
        <script>
            function SubmitCode(){
                document.getElementById('account-create-msg').innerHTML = "Account registration succesful!";
                alert("Account registration succesful!")
            }
        </script>
    </body>
</html>