<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                header("Location: homepage.html");
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="loginpage.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
        <script src="login.js"></script>
    </head>
    <body>
        <ul id="nav">
            <h1>Arizona Crime Data</h1>
        </ul>
        <h1 style="text-align:center; margin-top:110px; font-family: 'Roboto Mono', monospace;"><b>Login to Your Account</b></h1>
        <form method="post" action="" name="signin-form">
            <div id="logindiv">
                <table>
                    <tr>
                        <td>
                            <p>Username</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="username" id="username" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Password</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="password" id="password" required>
                        </td>
                    </tr>
                </table>
            </div>
            <p class="button">
                <button type="submit" name="login" value="login">Log In</button>
            </p>
        </form>
        <!--<p id="guest"><a href="homepage.html">Continue as Guest</a></p>-->
        <p id="signup">New to AZCD?<a href="register.php"> Signup</a></p>
    </body>
</html>