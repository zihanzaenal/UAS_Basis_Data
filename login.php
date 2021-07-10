<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login WIth MD5</title>
</head>
<body>
    <style>
body {font-family:Arial, Sans-Serif;}
.clearfix:before, .clearfix:after { content: ""; display: table; }
.clearfix:after { clear: both; }
a {color:#0067ab; text-decoration:none;}
a:hover {text-decoration:underline;}
.form{width: 300px; margin: 0 auto;}
input[type='text'], input[type='email'], input[type='password'] {width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;}
input[type='submit']:hover {background-color: #024978;}
    </style>
    <?php
        require('koneksi.php');
        session_start();
        if(isset($_POST['username'])){
            $username = stripcslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($koneksi,$username); //escapes special characters in a string
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($koneksi,$password);
            
        //Checking is user existing in the database or not
            $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
            $result = mysqli_query($koneksi,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['username'] = $username;
                header("Location: index.php"); // Redirect user to index.php
                }else{
                    echo "
                <div class='form'>
                    <h3>Username/password is incorrect.</h3>
                    <br/>Click here to 
                    <a href='index.php'>Go To</a>
                </div>";
                    }
        }else{
    ?>
                <div class="form">
                    <h1>Login</h1>
                    <form action="" method="post" name="login">
                        <input type="text" name="username" placeholder="Username" required />
                        <input type="password" name="password" placeholder="Password" required />
                        <input name="submit" type="submit" value="Login" />
                    </form>
                    <p>Not registered yet? 
                        <a href='registration.php'>Register Here</a>
                    </p>
                </div>
                <?php } ?>
            </body>
        </html>
    