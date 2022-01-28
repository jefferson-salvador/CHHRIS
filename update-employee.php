<?php
    session_start();
    require_once ('php/conn.php');

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "SELECT * FROM employees WHERE EMP_ID = $id";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();

        $sql = "SELECT * FROM users WHERE EMP_ID = $id";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0)
        {
            $user_data = $result->fetch_assoc();
            $admin_username = $user_data['USERNAME'];
            $admin_password = $user_data['PASSWORD'];
        }
    }

    $sql = "SELECT * FROM managers WHERE MANAGER_ID = $data[MANAGER_ID]";
    $result = $conn->query($sql);
    $assoc = $result->fetch_assoc();
    $manager_name = $assoc["Manager_Name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIS | Update Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="logo.png">
</head>
<body onload="checkRole()">
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
                        <a class="nav-link text-light active" href="employee-tab.php">Employees</a>
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
                      <a class="nav-link text-light " href="users_tab.php">Users</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome,  <?php
                                echo $_SESSION["username"];
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
                        <h2 class="p-5">EDIT EMPLOYEE</h2>
                    </div>
                    <form action=<?php echo 'php/EditEmployee.php?id='.$id;?> method="POST" id="add-employee-form" onsubmit="return validateForm()" onreset="resetErrors()">
                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="firstname">First Name:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="firstname" name="fname" value="<?php echo $data['FNAME']?>">
                                    <div class="error-message">
                                        <small id="fname-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="lastname">Last Name:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="lastname" name="lname" value="<?php echo $data['LNAME']?>">
                                    <div class="error-message">
                                        <small id="lname-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="middlename">Middle Name:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="middlename" name="mname" value="<?php echo $data['MNAME']?>">
                                    <div class="error-message">
                                        <small id="mname-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="address">Address:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="address" name="address" value="<?php echo $data['ADDRESS']?>">
                                    <div class="error-message">
                                        <small id="address-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="add-emp-form-check form-check p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="sex">Sex:</label>
                                </div>
                                <div class="col d-flex">
                                    <label class="radio-inline pr-5"><input type="radio" name="optradio" value="FEMALE" <?php echo ($data['SEX'] == "FEMALE") ? 'checked' : null; ?>> Female</label>
                                    <label class="radio-inline pl-5"><input type="radio" name="optradio" value="MALE" <?php echo ($data['SEX'] == "MALE") ? 'checked' : null; ?>> Male</label>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="date-of-birth">Date of Birth:</label>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control border-secondary" id="date-of-birth" name="dob" value=<?php echo $data['DOB']?>>
                                    <div class="error-message">
                                        <small id="dob-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="place-of-birth">Place of Birth:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="place-of-birth" name="pob" value="<?php echo $data['PLACE_OF_BIRTH']?>">
                                    <div class="error-message">
                                        <small id="pob-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="contact-number">Contact Number:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="contact-number" name="contact" value=<?php echo $data['CONTACT_NUM']?>>
                                    <div class="error-message">
                                        <small id="contact-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="civil-status">Civil Status:</label>
                                </div>
                                <div class="col">
                                    <select class="form-control border-secondary" id="civil-status" name="civilstatus" value=<?php echo $data['CIVIL_STATUS']?>>
                                        <option <?php echo ($data['CIVIL_STATUS'] == "SINGLE") ? 'selected' : null; ?>>Single</option>
                                        <option <?php echo ($data['CIVIL_STATUS'] == "MARRIED") ? 'selected' : null; ?>>Married</option>
                                        <option <?php echo ($data['CIVIL_STATUS'] == "WIDOWED") ? 'selected' : null; ?>>Widowed</option>
                                        <option <?php echo ($data['CIVIL_STATUS'] == "DIVORCED") ? 'selected' : null; ?>>Divorced</option>
                                    </select>
                                    <div class="error-message">
                                        <small id="civilstatus-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="position">Position:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="position" name="position" value="<?php echo $data['POSITION']?>" onkeyup="checkRole()">
                                    <div class="error-message">
                                        <small id="position-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="department">Department:</label>
                                </div>
                                <div class="col">
                                    <select class="form-control border-secondary" name="department" id="department">
                                    <option>None</option>
                                        <?php require_once('php/DepartmentsDropdown.php');?>
                                    </select>
                                    <div class="error-message">
                                        <small id="department-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="branch">Branch:</label>
                                </div>
                                <div class="col">
                                    <select class="form-control border-secondary" name="branch" id="branch">
                                        <option>None</option>
                                        <?php require_once('php/BranchDropwdown.php');?>
                                    </select>
                                    <div class="error-message">
                                        <small id="branch-error" class="error-container" style="color:red;"></small>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="work-status">Work Status:</label>
                                </div>
                                <div class="col">
                                    <select class="form-control border-secondary" name="workstatus" id="work-status">
                                        <option <?php echo ($data['WORK_STATUS'] == "REGULAR") ? 'selected' : null; ?>>REGULAR</option>
                                        <option <?php echo ($data['WORK_STATUS'] == "PART-TIME") ? 'selected' : null; ?>>PART-TIME</option>
                                        <option <?php echo ($data['WORK_STATUS'] == "INTERN") ? 'selected' : null; ?>>INTERN</option>
                                    </select>
                                    <div class="error-message">
                                        <small id="workstatus-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="hired-date">Hired Date:</label>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control border-secondary" id="hired-date" name="hireddate" value=<?php echo $data['HIRED_DATE']?>>
                                    <div class="error-message">
                                        <small id="hireddate-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="branch">Manager:</label>
                                </div>
                                <div class="col">
                                    <select class="form-control border-secondary" name="manager" id="manager">
                                        <?php require_once('php/ManagersDropdown.php');?>
                                    </select>
                                    <div class="error-message">
                                        <small id="manager-error" class="error-container" style="color:red;"></small>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="salary">Salary:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="salary" name="salary" value=<?php echo $data['SALARY']?>>
                                    <div class="error-message">
                                        <small id="salary-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="commission">Commission:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="commission" name="commission" value=<?php echo $data['COMMISSION']?>>
                                    <div class="error-message">
                                        <small id="commission-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2" id="username-div" style="display: none;">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="firstname">Username:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control border-secondary" id="username" name="username" value=<?php echo isset($admin_username) ? $admin_username : "";?>>
                                    <div class="error-message">
                                        <small id="username-error" class="error-container" style="color:red;"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-emp-form-group p-2" id="password-div" style="display: none;">
                            <div class="row d-flex align-items-center">
                                <div class="col-4 px-5 d-flex justify-content-end">
                                    <label for="firstname">Password:</label>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control border-secondary" id="password" name="password" value=<?php echo isset($admin_password) ? $admin_password : "";?>>
                                    <div class="error-message">
                                        <small id="password-error" class="error-container" style="color:red;"></small>
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


    <script src="./js/employees.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>