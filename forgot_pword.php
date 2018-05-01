<!DOCTYPE html>
<?php
    session_start();
    $sql = new mysqli('localhost','root','root','new_database');
    $name1 = $sql->escape_string($_POST['name1']);
    if(isset($_POST['continue'])){
        if(isset($_POST['email']) && isset($_POST['newp1']) && isset($_POST['newp2'])){
            if($_POST['newp1'] == $_POST['newp2']){
                $new_password = md5($_POST['newp2']);
                $email = $_POST['email'];
                $query = ("UPDATE users SET Password='$new_password' WHERE Username='$name1'");
                $sql->query($query);
                header("index.php");
            }
        }
    }
?>
<link rel="stylesheet" type="text/css" href="forgot_pword_style.css">
<html class='forgot'>
	<body>
        <form method='post'>
            Username: <input type='text' name='name1'><br/>
            Email: <input type='text' name='email'><br/>
            New Password: <input type='text' name='newp1'><br/>
            Retype: <input type='text' name='newp2'><br/>
        </form>
        <form method = 'post'>
            <input type='submit' name='continue' value='Continue'>
        </form>
        <form method='post' action='index.php'>
            <input type='submit' value='Exit'>
        </form>
    </body>
</html>