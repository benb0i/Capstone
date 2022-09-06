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

<!DOCTYPE HTML>

<html lang="en-US">
<head>
    <link rel="stylesheet" href="signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <ul id="nav">
        <h1>Arizona Crime Data</h1>
    </ul>
	<h1 style="text-align:center; margin-top:110px; font-family: 'Roboto Mono', monospace;"><b>Create an Account</b></h1>
	<form action="" method="post" id="form_id" name="signup-form">
        <div id="signupdiv">
            <table>
				<tr>
                    <td>
                        <p>Enter Your Username</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="username" id="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Enter Your Email</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Create a Password</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" id="password">
                    </td>
                </tr>
            </table>
        </div>
		<p style="text-align: center;">
			<input id="submitbtn" type="submit" value="Register">
		</p>
    </form>