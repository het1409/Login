<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '' , 'login') or die ('Unable to connect');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align: center;
        }

        .field{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <h2>Please Login</h2>
    <div>
        <form action = "form.php" method = "post">
            <input type = "text" class = "field" name = "Username" placeholder = "Username" required = ""><br/>
            <input type = "password" class = "field" name = "Pwd" placeholder = "Password" required = ""><br/>
            <input type = "submit" class = "field" name = "login" value = "Login">
        </form>
    </div>

<?php
    if (isset($_POST['login'])){
        $Username = $_POST['Username'];
        $Pwd = $_POST['Pwd'];

    $select = mysqli_query($conn," SELECT * FROM demo WHERE Username = '$Username' AND Pwd = '$Pwd' ");
    $row  = mysqli_fetch_array($select);

    if(is_array($row)) {
        $_SESSION["Username"] = $row['Username'];
        $_SESSION["Pwd"] = $row['Pwd'];
    }   else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "form.php" ';
        echo '</script>';
    }
    }
    if(isset($_SESSION["Username"])){
        header("Location:login.php");
    }
?>

</body>
</html>