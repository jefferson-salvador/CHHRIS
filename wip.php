<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HRIS | In Progress</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" href="logo.png">
    </head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" id="wip">
        <div class="text-center">
            <h1 class="text-center">WAIT INAANO PA.</h1>
            <?php
                                if(isset($_SESSION["login_error"])){
                                    echo "<span> $_SESSION[login_error] </span>" ;
                                }
                                unset($_SESSION["login_error"])
                            
                            ?>
            <img src="wip.gif" alt="wip" id="wip-image">
            <div class="pt-5">
                <a href="index.php"><button class="btn btn-warning">GO BACK</button></a>
            </div>
        </div>
    </div>
</body>
</html>