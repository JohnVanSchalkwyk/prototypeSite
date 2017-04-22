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



$(document).ready(function() {

            

            $("#logout_user").click(function(){
                logout();
            });
});