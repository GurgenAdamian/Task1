<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<style>
    h4 {
        background-color: red;
        color: aliceblue;
        margin-right: 1670px;
        border-radius: 20px;
        padding: 10px;
    }

    .error {
        color: red;
    }
</style>

<body>
    <?php
    require('config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username_reg = mysqli_real_escape_string($conn, $_POST["username"]);
        $password_reg = mysqli_real_escape_string($conn, $_POST["password"]);
        $password_confirm_reg = mysqli_real_escape_string($conn, $_POST["password_confirm"]);
        $email_reg = mysqli_real_escape_string($conn, $_POST["email"]);
        $username_error = false;
        $password_error = false;
        $email_error = false;
        $error = false;

        if ($password != $password_confirm) {
            echo '<h4>Write the same password</h4>';
        }

        #username
        if (empty($username_reg)) {
            echo '<h3 class="error">The username is empty</h3>';
        } else {
            $username_error = true;
            $sql_insert_username = "INSERT INTO 
                                      `test`
                           SET
                                      `username` = '$username_reg'         
            ";
            $result_insert_username = $conn->query($sql_insert_username);

            if ($result_insert_username === false) {
                echo "`username` is $conn->error";
            } else {
                header('Location: config.php');
            }
        }

        #password
        if (empty($password_reg)) {
            echo '<h3 class="error">The password is empty</h3>';
        } else {
            $password_error = true;
            $sql_insert_password = "INSERT INTO 
                                      `test`
                           SET
                                      `password` = '$password'         
            ";
            $result_insert_password = $conn->query($sql_insert_password);

            if ($result_insert_password === false) {
                echo "`password` is $conn->error";
            } else {
                header('Location: config.php');
            }
        }


        #password_confirm
        if (empty($password_confirm_reg)) {
            echo '<h3 class="error">The password_confirm is empty</h3>';
        }

        #email
        if (empty($email_reg)) {
            echo '<h3 class="error">The email is empty</h3>';
        } else {
            $email_error = true;
            $sql_insert_email = "INSERT INTO 
                                      `test`
                           SET
                                      `email` = '$email_reg'         
            ";
            $result_insert_email = $conn->query($sql_insert_email);

            if ($result_insert_email === false) {
                echo "`email` is $conn->error";
            } else {
                header('Location: config.php');
            }
        }

        function validateEmail($email_reg)
        {
            $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
            echo preg_match($regex, $email_reg) ? '<h3 class="error">The email is valid</h3>' . "<br>" : '<h3 class="error">The email is not valid</h3>';
        }

        validateEmail($email);

        #-------------------------------

        if ($username_error && $password_error && $email_error) {
            $error = true;
        }

        mysqli_close($conn);
    }

    ?>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>Registration</h1>
        <input type="text" placeholder="Write your username" name="username"><br><br>
        <input type="password" placeholder="Write your password" name="password"><br><br>
        <input type="password" placeholder="Check your password" name="password_confirm"><br><br>
        <input type="text" placeholder="Write your email" name="email"><br><br>
        <input type="submit">
        <input type="reset">
        <a href="login.php" style="display:<?= $error ? "inline" : "none" ?>;"></a>
    </form>
</body>

</html>