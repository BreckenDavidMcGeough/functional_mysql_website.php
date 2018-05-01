<!DOCTYPE html>

<?php
    session_start();
    $mysql = new mysqli('localhost','root','root','bankAccoint');
    $user = $_SESSION['user_in_db'];
    $item = $_POST['item'];
    $cost = $_POST['cost'];
    $location = $_POST['location'];
    if(isset($_POST['button'])){
        if(count($item)>0 && count($cost)>0 && count($location)>0){
            $user = $mysql->escape_string($user);
            $cost = $mysql->escape_string($cost);
            $location = $mysql->escape_string($location);
            $query = ("INSERT INTO statements(user,item,cost,location) VALUES ('$user','$item','$cost','$location')");
            if(!empty($location) && !empty($cost) && !empty($item)){
                $mysql->query($query);
            }
        }else{
            echo "Input info";
        }
    }
?>
<html>
    <form method='post'>
        Item: <input type='text' name='item' id='item'><br/>
        Cost: <input type='text' name='cost' id='cost'><br/>
        Location bought from (url or other): <input type='text' name='location' id='location'><br/>
        <button name='button'>Submit</button>
    </form>
    <form action='view_history.php'>
        <button>View</button>
    </form>
    <form action='homepage_index.php'>
        <input type='submit' value='Exit'>
    </form>
    <script type='text/javascript'>
        var button = document.querySelector('button');
        button.addEventListener("click",function(){
            var item = document.getElementById('item').value;
            var cost = document.getElementById('cost').value;
            var location = document.getElementById('location').value;
            if(item.length>0 && cost.length>0 && location.length>0){
                alert("Your information is safe with us!"); 
            }else{
                alert("Please input all information");
            }
        });
    </script>
</html>