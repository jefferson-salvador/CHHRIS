const fname = document.getElementById("firstname");
const lname = document.getElementById("lastname");
const mname = document.getElementById("middlename");
const address = document.getElementById("address");
const dob = document.getElementById("date-of-birth");
const pob = document.getElementById("place-of-birth");
const contact = document.getElementById("contact-number");
const civilstatus = document.getElementById("civilstatus");
const position = document.getElementById("position");
const department = document.getElementById("department");
const branch = document.getElementById("branch");
const workstatus = document.getElementById("work-status");
const hireddate = document.getElementById("hired-date");
const manager = document.getElementById("manager");
const salary = document.getElementById("salary");
const commission = document.getElementById("commission");
const username = document.getElementById("username");
const password = document.getElementById("password");
const usernameDiv = document.getElementById("username-div");
const passwordDiv = document.getElementById("password-div");
const pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

var curr_page = 1;
var total_pages = 5;
var limit;
var error_containers = document.getElementsByClassName("error-container");

function showEmployees(str)
{
    limit =  document.getElementById("limit").value;
    console.log("page: ",curr_page);

    if(str.length == 0)
    {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                document.getElementById("empTableBody").innerHTML = this.responseText;
                showTableInfo();
               
            }
        };

        xmlhttp.open("GET", "php/GetEmployees.php?limit=" + limit + "&page=" + curr_page, true);
        xmlhttp.send();
    }
    else
    {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                document.getElementById("empTableBody").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET", "php/SearchEmployee.php?limit=" + limit + "&toSearch=" + str, true);
        xmlhttp.send();
    }

    showPageLinks(limit);
}


function showPageLinks(lim)
{
    var limit = lim;
    
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById("pagelinks").innerHTML = this.responseText;
            pages = document.getElementsByClassName("page-link");
            total_pages = pages.length - 2;
        }
    };

    xmlhttp.open("GET", "php/EmployeePageLinks.php?limit=" + limit + "&page=" + curr_page, true);
    xmlhttp.send();
}


function showTableInfo()
{
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById("table_info").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "php/EmployeeTableInfo.php?limit=" + limit + "&page=" + curr_page, true);
    xmlhttp.send();
}


function loadPage(page)
{
    curr_page = page;
    showEmployees('');
}


function next()
{
    if(curr_page == total_pages)
    {
        curr_page = 1;
    }
    else
    {
        curr_page++;
    }

    showEmployees('');
}


function prev()
{
    if(curr_page == 1)
    {
        curr_page = total_pages;
    }
    else
    {
        curr_page--;
    }
    showEmployees('');
}

function toPDF(empid){
    console.log("clicked!");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","php/pdf.php?empId="+empid, true);
    console.log("done 1");
    xmlhttp.send();
    console.log("done 2");
}


function validateForm()
{
    var errors = 0;

    if(fname.value == "")
    {
        setError("fname", "First name cannot be blank");
        errors++;
    }

    if(lname.value == "")
    {
        setError("lname", "Last name cannot be blank");
        errors++;
    }

    if(mname.value == "")
    {
        setError("mname", "Middle name cannot be blank");
        errors++;
    }

    if(address.value == "")
    {
        setError("address", "Address name cannot be blank");
        errors++;
    }

    if(pob.value == "")
    {
        setError("pob", "Place of birth cannot be blank");
        errors++;
    }

    if(dob.value == "")
    {
        setError("dob", "Please pick a date");
        errors++;
    }
    
    if(contact.value == "")
    {
        setError("contact", "Contact cannot be blank");
        errors++;
    }

    if(position.value == "")
    {
        setError("position", "Position cannot be blank");
        errors++;
    }

    if(department.value == "None")
    {
        setError("department", "Please select a department");
        errors++;
    }

    if(branch.value == "None")
    {
        setError("branch", "Please select a branch");
        errors++;
    }

    if(hireddate.value == "")
    {
        setError("hireddate", "Please pick a date");
        errors++;
    }

    if(manager.value == "None")
    {
        setError("manager", "Please select a manager");
        errors++;
    }

    if(salary.value == "")
    {
        setError("salary", "Salary cannot be blank");
        errors++;
    }
    else if(isNaN(salary.value))
    {
        setError("salary", "Please enter a valid number");
        errors++;
    }

    if(commission.value == "")
    {
        setError("commission", "Commission cannot be blank");
        errors++;
    }
    else if(isNaN(commission.value))
    {
        setError("commission", "Please enter a valid number");
        errors++;
    }

    if(position.value.toUpperCase() == "HR" || position.value.toUpperCase() == "HUMAN RESOURCE")
    {
        if(username.value == "")
        {
            setError("username", "Username cannot be blank");
            errors++;
        }

        if(password.value == "")
        {
            setError("password", "Password cannot be blank");
            errors++;
        }
        else if(!password.value.match(pass))
        {
            setError("password", "Password must be at least 6 characters and contain at least one numeric digit, one uppercase and one lowercase letter");
            errors++;
        }
    }

    return errors < 1;
}


function setError(str, msg)
{
    document.getElementById(str + "-error").innerHTML = msg;
}


function resetErrors()
{
    for(i = 0; i < error_containers.length; i++)
    {
        error_containers[i].innerHTML = "";
    }
}


function checkRole()
{
    if(position.value.toUpperCase() == "HR" || position.value.toUpperCase() == "HUMAN RESOURCE")
    {
        if(usernameDiv.style.display === "none" && passwordDiv.style.display ==="none")
        {
            usernameDiv.style.display = "block";
            passwordDiv.style.display = "block";
        }
    }
    else
    {
        usernameDiv.style.display = "none";
        passwordDiv.style.display = "none";
    }
}