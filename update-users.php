<?php
    session_start();
    require_once ('php/conn.php');

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "SELECT * FROM chhris_users WHERE USER_ID = $id";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS | Update Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="logo.png">
</head>
<body>
    <div class="container-fluid wrapper">
        <nav class="navbar navbar-expand-md navbar-light mb-2">
            <div class="container-fluid">
                <a href="employee-tab.php" class="navbar-brand mr-5">
                    <img src="logo.png" width="" height="" class="navlogo" alt="" loading="lazy" >
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse"
                data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>    
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="employee-tab.php">Employees</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-light " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Utilities
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item " href="branches-tab.php">Branches</a>
                                <a class="dropdown-item" href="department-tab.php">Departments</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light active" href="users_tab.php">Users</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, <?php
                                echo htmlspecialchars($_SESSION["username"], ENT_QUOTES, 'UTF-8');
                                //substr(ucfirst(strtolower($_SESSION["username"])), 0 , strpos(ucfirst(strtolower($_SESSION["username"])), " "))
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" target="_blank" <?php echo 'href="php/pdf.php?empId='.$_SESSION['id'].'&mode=I"' ?>>Profile</a> <!-- just show pdf here -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="php/logout.php">Log Out</a>
                        </div>
                    </li>
                  </ul>
                </div>
            </div>    
        </nav>

        <div class="container">
            <div class="row">
                <div class="d-flex flex-column mx-auto w-100 pb-5">
                    <div class="text-center">
                        <h2 class="p-5">EDIT USERS</h2>
                    </div>
                    <form id="add-employee-form" action=<?php echo 'php/EditUser.php?id='.$id;?> method="POST" onsubmit="return validateForm()" onreset="resetErrors()">
                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="firstname">Account Name:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="accname" name="accname" value="<?php echo $data['ACC_NAME'];?>">
                                    <div class="error-message">
                                        <small id="accname-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="username">Username:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="username" name="username" value="<?php echo $data['USERNAME'];?>">
                                    <div class="error-message">
                                        <small id="username-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="role">Role:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="role" name="role" value="<?php echo $data['ROLE'];?>">
                                    <div class="error-message">
                                        <small id="role-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="add-emp-buttons text-center w-100 pt-5">
                            <button type="reset" class="btn add-emp-button mx-3 text-light">Cancel</button>
                            <button type="submit" class="btn add-emp-button mx-3 text-light">Update</button>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <script src="./js/users.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>