<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>USER AUTHENTICATION</title>
    <style type="text/css">
        body{
            background-color: #b2bec3;
        }
        .login{
            font-family: arial;background:white;border: 2px solid white;padding: 10px;
            width: 350px;color:black;height: auto;margin: 50px auto;text-align: center;
        }

        .login-form {
            width: 320px;
            height: 210px;
            margin: 0 auto;
            font-family: Tahoma, Geneva, sans-serif;
        }
        
        .login-form input[type="password"],
        .login-form input[type="text"] {
            width: 100%;
            padding: 15px;
            border: 1px solid auto;
            margin-bottom: 12px;
            box-sizing:border-box;
            background-color: #95a5a6;
            color: #fff;
        }
        .login-form input[type="submit"] {
            width: 100%;padding: 15px;background-color: #34495e;
            border: 0;  font-weight: bold;color: white;
        }
    </style>
</head>
<body>
    <div class="login">
    <H2>Login User</H2>
    <div class="login-form">
    <form action="sistem.php?op=in" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="Password" name="password" placeholder="Password">
        <input type="submit" value="Login" >
    </form>
    </div>
    </div>
</body>
</html>