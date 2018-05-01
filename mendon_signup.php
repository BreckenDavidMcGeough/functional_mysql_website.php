<!DOCTYPE html>
<?php
    $mysql = new mysqli("localhost","root","root","new_database");
    if(!$mysql){
        echo "Wrong";
    }
    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username = $mysql->escape_string($_POST['username']);
            $password = md5($_POST['password']);
            $query = "SELECT * FROM users WHERE Username = '$username'";
            $result = $mysql->query($query);
            $row = $result->fetch_array();
            if($row['Password'] != $password){
                $querytwo = "INSERT INTO users(Username,Password) VALUES ('$username','$password')";
                $mysql->query($querytwo);
                header("Location: mendon_homepage.php");               
            }else{
                echo "Error";
            }
        }
    }
?>
<html>
    <form method = 'post'>
        Username:<input type = 'text' id = 'username' name='username'><br/>
        Password:<input type='text' id='password' name='password'><br/>
        <input type='submit' value='submit' name='submit' id='submit'>
    </form>
    <a href='mendon_homepage.php'>Exit</a>
</html>