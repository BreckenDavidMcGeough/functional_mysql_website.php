<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="homepage_style.css">
<link rel='stylesheet' type='text/javascript' href='client_side.js'> 
<?php
    $mysql = new mysqli('localhost','root','root','new_database');
	session_start();
    $name = $_SESSION['user_in_db'];
	echo "Welcome Back: ".$name.": ";
    if($name == 'brecken'){
        echo "status->(creator)";
    }else{
        echo "status->(user)";
    }
	if(isset($_POST['button_p'])){
		if($name == $name){
			$password_one = $mysql->escape_string($_POST['password_1']);
			$password_two = $mysql->escape_string($_POST['password_2']);
			$password_three = $mysql->escape_string($_POST['password_3']);
			$password_four = $mysql->escape_string($_POST['password_4']);
			$password_five = $mysql->escape_string($_POST['password_5']);
            $location_one = $mysql->escape_string($_POST['location1']);
            $location_two = $mysql->escape_string($_POST['location2']);
            $location_three = $mysql->escape_string($_POST['location3']);
            $location_four = $mysql->escape_string($_POST['location4']);
            $location_five = $mysql->escape_string($_POST['location5']);
            
            if(!empty($password_one)){
                $query1 = ("UPDATE users SET stored_passwords1='$password_one' WHERE Username='$name'");
                $mysql->query($query1);
            }
            if(!empty($location_one)){
                $query1a = ("UPDATE users SET stored_locations1='$location_one' WHERE Username='$name'");
                $mysql->query($query1a);
            }
            if(!empty($password_two)){
                $query2 = ("UPDATE users SET stored_passwords2='$password_two' WHERE Username='$name'");
                $mysql->query($query2);
            }
            if(!empty($location_two)){
                $query2a = ("UPDATE users SET stored_locations2='$location_two' WHERE Username='$name'");
                $mysql->query($query2a);
            }
            if(!empty($password_three)){
                $query3 = ("UPDATE users SET stored_passwords3='$password_three' WHERE Username='$name'");
                $mysql->query($query3);
            }
            if(!empty($location_three)){
                $query3a = ("UPDATE users SET stored_locations3='$location_three' WHERE Username='$name'");
                $mysql->query($query3a);
            }
            if(!empty($password_four)){
                $query4 = ("UPDATE users SET stored_passwords4='$password_four' WHERE Username='$name'");
                $mysql->query($query4);
            }
            if(!empty($location_four)){
                $query4a = ("UPDATE users SET stored_locations4='$location_four' WHERE Username='$name'");
                $mysql->query($query4a);
            }
            if(!empty($password_five)){
                $query5 = ("UPDATE users SET stored_passwords5='$password_five' WHERE Username='$name'");
                $mysql->query($query5);
            }
            if(!empty($location_five)){
                $query5a = ("UPDATE users SET stored_locations5='$location_five' WHERE Username='$name'");
                $mysql->query($query5a);
            }
		}else{
			echo " !Type in at least 1 password to be saved!";
		}
	}
?>
<html>
	<body class='homestyle'>
		<form method='post' name='checkname'>
			Store up to 5 passwords:<br/>
			<input type='text' name='password_1' id='password1'> Place used:<input type='text' name='location1' id='location1'><br/>
			<input type='text' name='password_2' id='password2'> Place used:<input type='text' name='location2' id='location2'><br/>
			<input type='text' name='password_3' id='password3'> Place used:<input type='text' name='location3' id='location3'><br/>
			<input type='text' name='password_4' id='password4'> Place used:<input type='text' name='location4' id='location4'><br/>
			<input type='text' name='password_5' id='password5'> Place used:<input type='text' name='location5' id='location5'><br/>
            <button name='button_p'>Submit</button>
		</form>
		<form method='post' action='access_passwords.php'>
			<input type='submit' name='view' value='View'>
		</form>
        <form method='post' action='index.php'>
            <input type='submit' name='sign_out' value='Sign out'>
        </form>
        <form method='post' action='add_notes.php'>
            <input type='submit' value='Add Notes' name='Add Notes'><br/>
        </form>
        <form action='email_user.php'>
            <input type='submit' value='Email Myself'>
        </form>
        <form action='twitter_clone.php'>
            <input type='submit' value='Interact'>
        </form>
        <form action='bank_history.php'>
            <button>
            Keep track of your spending
            </button>
        </form>
        <form action='store_morepasswords.php'>
            <button>Store more than 5 passwords</button>
        </form>
        <a href='delete_account.php'>DELETE ACCOUNT</a>
        <script type='text/javascript'>
            var funcList = {
                getPassword : function(if_true){
                    if(if_true == 'true'){
                        var password1 = document.getElementById("password1").value;
                        var password2 = document.getElementById("password2").value;
                        var password3 = document.getElementById("password3").value;
                        var password4 = document.getElementById("password4").value;
                        var password5 = document.getElementById("password5").value;
                        if(password1.length == 0 && password2.length == 0 && password3.length== 0 && password4.length==0 && password5.length == 0){
                            return false;
                        }else{
                            return true;
                        }
                    }
                },
                getLocation : function(if_true){
                    if(if_true == 'true'){
                        var location1 = document.getElementById("location1");
                        var location2 = document.getElementById("location2");
                        var location3 = document.getElementById("location3");
                        var location4 = document.getElementById("location4");
                        var location5 = document.getElementById("location5");
                        if(location1.length==0 && location2.length==0 && location3.length == 0 && location4.length==0 && location5.length==0){
                            return false;
                        }else{
                            return true;
                        }
                    }
                }
            }
            var button = document.querySelector("button");
            button.addEventListener("click",function(){
                if(funcList.getPassword('true') == false || funcList.getLocation('true')== false){
                    alert("Please type in all information");
                }
            })
        </script>
	</body>
</html>