<!DOCTYPE html>
<?php
    session_start();
    $mysql = new mysqli('localhost','root','root','password_db');
    $user = $_SESSION['user_in_db'];
    if(isset($_POST['button'])){
        if(isset($_POST['password']) && isset($_POST['location'])){
            $password = $_POST['password'];
            $location = $_POST['location'];
            $query = ("INSERT INTO passwords(user,password,location) VALUES ('$user','$password','$location')");
            if(!empty($password) && !empty($location)){
                $mysql->query($query);
            }
        }
    }
?>
<html>
    <form method='post'>
        Password: <input type='text' id='password' name='password'><br/>
        Location: <input type='text' id='location' name='location'><br/>
        <button name='button'>Submit</button>
    </form>
    <form action='view_morepasswords.php'>
        <button>View</button>
    </form>
    <form action='homepage_index.php'>
        <button>Exit</button>
    </form>
    <script type='text/javascript'>
        var button = document.querySelector('button');
        button.addEventListener("click",function(){
           var password = document.getElementById("password").value;
            var location = document.getElementById("location").value;
            if(password.length > 0 && location.length >0){
                alert("Your information is safe with us");
            }
            if(password.length == 0 && location.length == 0){
                alert("Please type in a password/location");
            }
        });
    </script>
</html>