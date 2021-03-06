<?php 

 if(isset($_POST["user"])){

    include("db.php");

    $sql = "select username , passwordd from userr where username=? and passwordd=?";

    $q = $db->prepare( $sql ) ;
    $q->execute( [ $_POST["user"] , $_POST["password"] ] ) ;
    
    if( $q->rowCount() == 1)
    {
        session_start();
        $_SESSION["user"] = $q->fetch() ;
        header("Location:index.php");
    }
    else
    {
        echo "<h2 class='alert'>Please Check Your Password</h2>";
    }


 }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/2.jpg">

    <title>Login</title>
    <style>
                                    
                body{
                    margin: 0;
                    padding: 0;
                    font-family: sans-serif;
                    background: url(img/bg3.jpg)  no-repeat center 0px;
                    background-size: cover;
                
                    
                
                    background-position: center 0; 
                    background-repeat: no-repeat;  
                    background-attachment: fixed; 
                    -webkit-background-size: cover;  
                    -o-background-size: cover;  
                    -moz-background-size: cover;  
                    -ms-background-size: cover;
                    
                }
                .login-box{
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%,-50%);
                    width: 400px;
                    padding:40px;
                    background: rgba(0,0,0,.8);
                    box-sizing: border-box;
                    box-shadow: 0 15px  25px rgba(0,0,0,.5);
                    border-radius: 10px;
                }
                .login-box h2{
                    margin: 0 0 30px;
                    padding: 0;
                    text-align: center;
                    color: #fff;
                }
                .login-box .login-field{
                    position: relative;
                }
                .login-box .login-field  input{
                    width: 100%;
                    padding: 10px 0;
                    font-size: 16px;
                    color: #fff;
                    margin-bottom: 30px;
                    border: none;
                    border-bottom: 1px solid #fff;
                    outline: none;
                    background: transparent;
                }
                .login-box .login-field  label{
                    position: absolute;
                    top: 0;
                    left: 0;
                    letter-spacing: 1px;
                    padding: 10px 0;
                    font-size: 16px;
                    color: #fff;
                    pointer-events: none;
                    transition: .5s;
                }
                .login-box .login-field input:focus ~ label,
                .login-box .login-field input:valid ~ label{
                    top: -23px;
                    left: 0;
                    color: aqua;
                    font-size: 12px;
                }
                .login-box button{
                    background: transparent;
                    border: none;
                    outline: none;
                    color: #fff;
                    background: #03a9f4;
                    padding: 10px 20px;
                    cursor: pointer;
                    border-radius: 5px;
                }
    </style>
</head>
<body class="bg-primary">
        <div class="login-box">
                    <h2>Login</h2>
                    <form method="POST">
                        <div class="login-field">
                            <input type="text" name="user" required="" />
                            <label>Username</label>
                        </div>
                        <div class="login-field">
                            <input type="password" name="password" required="" />
                            <label >Password</label>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>

</body>
</html>