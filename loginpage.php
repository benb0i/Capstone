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
        <form method="post" action="" name="signin-form">
            <div id="logindiv">
                <table>
                    <tr>
                        <td>
                            <p>Email</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="useremail" id="useremail" required>
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
            <button type="submit" name="login" value="login">Log In</button>
        </form>
        <p id="guest"><a href="homepage.html">Continue as Guest</a></p>
        <p id="signup">New to AZCD?<a href="signup.php"> Signup</a></p>
    </body>
</html>