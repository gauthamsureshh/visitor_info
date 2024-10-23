<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="authStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div class="container">
        <h1 class="text-center" style="color: white;">Login</h1>
        <div class="card">
            <div class="card-body">
                <form action="authHandler.php" method="post">
                    <div class="form-group">
                        <label style="color: white;">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label style="color: white;">Password</label>
                        <input type="password" class="form-control" name="pwd">
                    </div>
                    <div class="text-center">
                    <button class="btn btn-primary" type="submit" style="margin-bottom: 20px;" name="login">Login</button>
                    </div>
                    <p class="text-center" style="color: wheat;">Not a Member? <a href="signup.php" style="text-decoration: none; color:white">Sign Up </a></p>
                </form>
                <?php
                if(!isset($_GET['message'])){
                    exit();
                }
                else{
                    $data = $_GET['message'];

                    if ($data == 'empty'){
                        echo '<div class="alert alert-warning">All fields required</div>';
                    }
                    else if ($data == 'invalidcred'){
                        echo '<div class="alert alert-danger">Invalid email or password</div>';
                    }
                    else if ($data == 'success'){
                        echo '<div class="alert alert-success">User Registration Successful</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>