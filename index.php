<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS | Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="logo.png">
</head>
<body>
    <div class="container-fluid wrapper">
        <div class="row no-gutters">
            <div class="col no-gutters">
                <div class="left d-flex justify-content-center align-items-center">
                    <img src="logo.png" alt="logo" id="logo">
                </div>
            </div>
            <div class="col no-gutters">
                <div class="right d-flex justify-content-center align-items-center ">
                    
                    <form method ="POST" action="php/login.php">
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <div class="d-flex align-items-center px-3">
                                <i class="fa fa-user mr-3" aria-hidden="true"></i>
                                <input type="text" class="form-control  text-light" id="username" name ="username" aria-describedby="emailHelp" placeholder="ENTER YOUR EMAIL">
                            </div>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div><br>
                        <div class="form-group">
                            <label for="password">PASSWORD</label>
                            <div class="d-flex align-items-center px-3">
                                <i class="fa fa-lock mr-3" aria-hidden="true"></i>
                                <input type="password" class="form-control text-light" id="password" name="password" aria-describedby="emailHelp" placeholder="ENTER YOUR PASSWORD">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox">
                                <label class="form-check-label" for="checkbox">Remember me</label>
                            </div>
                            <div class="forget">
                                <a href="wip.php"><i>Forgot password?</i></a>
                            </div>
                        </div> <br>
                        <div>
                            <?php
                                if(isset($_SESSION["login_error"])){
                                    echo "<span style=color:red; > $_SESSION[login_error] </span>" ;
                                }
                                unset($_SESSION["login_error"])
                            
                            ?>
                        <div class="d-flex justify-content-center">
                            <button type="submit" id="login" class="btn">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>