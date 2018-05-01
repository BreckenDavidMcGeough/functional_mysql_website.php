<!DOCTYPE html>
<?php
    session_start();
    $mysql = new mysqli('localhost','root','root','notes');
    $user = $_SESSION['user_in_db'];
    $note = $mysql->escape_string($_POST['note1']);
    $class = $mysql->escape_string($_POST['class1']);
    $date = $mysql->escape_string($_POST['date1']);
    if(isset($_POST['submit6'])){
        if(!empty($note) && !empty($date) && !empty($class)){
            $query = ("INSERT INTO info(username,note,class,date) VALUES ('$user','$note','$class','$date')");
            $mysql->query($query);
        }elseif(!empty($note) && !empty($date)){
            $query1 = ("INSERT INTO info(username,note,date) VALUES('$user','$note','$date')");
            $mysql->query($query1);
        }
    }
?>
<html>
    <body>
        <form method='post'>
            Add notes: <br/>
            Note:<input type='text' name='note1'>Class(Optional):<input type='text' name='class1'>Date:<input type='text' name='date1'><br/>
            <input type='submit' name='submit6'><br/>
        </form>
        <form method='post' action='view_notes.php'>
            <input type='submit' name='view' value='view'><br/>
        </form>
        <form action='homepage_index.php'>
            <input type='submit' value='Exit' name='Exit'>
        </form>
        <script type='text/javascript'>

        </script>
    </body>
</html>