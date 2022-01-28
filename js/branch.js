const branchname = document.getElementById("branch-name");
const address = document.getElementById("address");
var error_containers = document.getElementsByClassName("error-container");

curPage= 1; 
total_pages=5

function pagination(cat){
    var limit = document.getElementById("limit").value; 
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status==200){
            document.getElementById("pagelinks").innerHTML = this.responseText;
            pages = document.getElementsByClassName("page-link");
            total_pages = pages.length - 2;
        }
    };
    xmlhttp.open("GET", "php/paginate.php?limit="+limit+"&curpage="+curPage+"&cat="+cat, true);
    xmlhttp.send();
}

function showTableInfo(cat)
{
    var xmlhttp = new XMLHttpRequest();
    var limit = document.getElementById("limit").value; 

    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById("table_info").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "php/tableinfo.php?limit=" + limit + "&page=" + curPage+ "&cat="+cat, true);
    xmlhttp.send();
}


function showBranch(page){
    var limit = document.getElementById("limit").value; 
    var str = document.getElementById("search").value;
    var xmlhttp = new XMLHttpRequest(); 

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status==200){
            document.getElementById("branchbody").innerHTML = this.responseText;
            showTableInfo("A");
            pagination("A");
        }
    };
    if(str){
        xmlhttp.open("GET", "php/GetBranch.php?limit="+limit+"&search="+str, true);
        if(page){
            curPage=page;
            xmlhttp.open("GET", "php/GetBranch.php?limit="+limit+"&page="+page, true); 
        }
    }
    else{
        xmlhttp.open("GET", "php/GetBranch.php?limit="+limit, true); 
        if(page){
            curPage=page;
            xmlhttp.open("GET", "php/GetBranch.php?limit="+limit+"&page="+page, true); 
        }
    }
    xmlhttp.send(); 
    

}
function edithandler(num){
    console.log("edit:" +num);
}
function deletehandler(num){
    console.log("delete: "+num);
}
function nexthandler(){
    if(curPage == total_pages){
        curPage = 1; 
    }
    else{
        curPage++;
    }
    showBranch(curPage);
}

function previoushandler(){
    if(curPage==1){
        curPage=total_pages; 
    }
    else{
        curPage--;
    }
    showBranch(curPage);
}


function validateForm()
{
    var errors = 0;

    if(branchname.value == "")
    {
        setError("branchname", "Branch name cannot be blank");
        errors++;
    }

    if(address.value == "")
    {
        setError("address", "Address cannot be blank");
        errors++;
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