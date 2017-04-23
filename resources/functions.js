function init()
{

}

function display(msg)
{
    document.getElementById("notification_body").innerHTML = msg;
    refresh();
    $("#notification").modal("show");
}

function welcome(user)
{
    
    var el = document.getElementById("loginHeader");
    el.innerHTML = '<div class="col-sm-12 pull-right text-right">Welcome '+user+' <button id="logout_user" class="btn btn-default">Logout</button></div>';
    refresh();

}

function logout()
{
    
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "logout.php";   
    document.body.appendChild(form);
    form.submit();
}

function refresh()
{
     var query = window.location.search.substring(1)

        
    if(query.length) 
    {
   
        if(window.history != undefined && window.history.pushState != undefined) 
        {
        

            window.history.pushState({}, document.title, window.location.pathname);
        }
    }
        
}

function selectDefault(option)
{
    switch (option) {
        case "signup":
            document.getElementById("tab-2").checked = true;
            break;
        case "signin":
            document.getElementById("tab-1").checked = true;
    
        default:
            break;
    }
}



$(document).ready(function() {

            

            $("#logout_user").click(function(){
                logout();
            });

            $('#signupbtn').on('click', function(event) {
                    selectDefault("signup"); // To prevent following the link (optional)
            });
            $('#signinbtn').on('click', function(event) {
                    selectDefault("signin"); // To prevent following the link (optional)
            });

});