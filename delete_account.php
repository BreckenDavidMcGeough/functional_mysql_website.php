<!DOCTYPE html>
<?php 
    session_start();
    $mysql = new mysqli('localhost','root','root','new_database');
    $mysql2 = new mysqli('localhost','root','root','bankAccoint');
    $mysql3 = new mysqli('localhost','root','root','notes');
    $mysql4 = new mysqli('localhost','root','root','twitter');
    $user = $_SESSION['user_in_db'];
    if(isset($_POST['submit'])){
        $query = ("DELETE FROM users WHERE Username='$user'");
        $query2 = ("DELETE FROM statements WHERE user='$user'");
        $query3 = ("DELETE FROM info WHERE username='$user'");
        $query4 = ("DELETE FROM tweets WHERE username='$user'");
        $mysql2->query($query2);
        $mysql3->query($query3);
        $mysql4->query($query4);
        $mysql->query($query);
        header("index.php");
    }
?>
<html>
    <form method='post'>
        <button name='submit'>DELETE</button><br/>
    </form>
    <form action='homepage_index.php'>
        <input type='submit' value='Exit'>
    </form>
    <script type='text/javascript'>
        var button = document.querySelector("button");
        button.addEventListener("click",function(){
            alert("Your Account has been deleted");
        });
    </script>
</html>