<!DOCTYPE html>

<?php
    session_start();
    $mysql = new mysqli("localhost","root","root","new_database");
    if(!$mysql){
        echo "Wrong";
    }
    if(isset($_POST['button'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username = $mysql->escape_string($_POST['username']);
            $password = md5($_POST['password']);
            $query = "SELECT * FROM users WHERE Username = '$username'";
            $result = $mysql->query($query);
            $row = $result->fetch_array();
            if($row['Password'] == $password){
                $_SESSION['user'] = $username;
                header("Location: mendon_homepage.php");
            }else{
                echo "Incorrect";
            }
        }else{
            echo "Please input information";
        }
    }
?>

<html>
    <form method = 'post'>
        Username: <input type = 'text' id = 'username' name='username'><br/>
        Password: <input type = 'text' id = 'password' name='password'><br/>
        <input type='submit' id ='button' name='button' value='Sign in'>
    </form>
    <a href = 'mendon_homepage.php'>Exit</a>
</html>