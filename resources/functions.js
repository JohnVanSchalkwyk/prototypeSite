function init()
{
    getUserData();
    populateMyEvents();
}

function bookEvent(){
     $.ajax({

                type:'POST',
                url: 'getAllEvents.php',
                data: {data: 0},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  
                    
                    $("#bookEventContent").html(res);
                    $("#bookEventModal").modal("show");
                }


          });
}

function queryBook(book)
{
    var id;

    if(readCookie("persistUser"))
    {
        id = getCookie("persistUser");
    }
    else if(readCookie("user"))
    {
        id = getCookie("user");
    }
    id = JSON.parse(id);
    var arr = [id[0],book];
    $.ajax({

                type:'POST',
                url: 'bookEvent.php',
                data: {data: JSON.stringify(arr)},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  
                    
                   if(res == "NULL")
                   {
                        display("Error");
                   }
                   else if(res == "ALREADYBOOKED")
                   {
                        display("You have already booked for this event");
                   }
                   else if(res == "Success")
                   {
                        $("#bookEventModal").modal("hide");
                        display("Successfully Booked Event");
                   }
                }


          });
}

function createNewEvent()
{
    populateField();
    var id;

    if(readCookie("persistUser"))
    {
        id = JSON.parse(getCookie("persistUser"));
    }
    else if(readCookie("user"))
    {
        id = JSON.parse(getCookie("user"));
    }
     $.ajax({

                type:'POST',
                url: 'verifyUser.php',
                data: {data: JSON.stringify(id)},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  if(res == true)
                  {
                        $("#createEventModal").modal("show");
                  }
                  else
                  {
                      display("You do not have the required permissions");
                  }
                    
                 
                }


          });

 
}

function populateMyEvents()
{
    var id

    if(readCookie("persistUser"))
    {
        id = JSON.parse(getCookie("persistUser"));
    }
    else if(readCookie("user"))
    {
        id = JSON.parse(getCookie("user"));
    }
     $.ajax({

                type:'POST',
                url: 'getMyEvents.php',
                data: {data: JSON.stringify(id)},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  
                    
                    $("#eventContents").html(res);
                }


          });
}

function isLoggedin()
{
    
    if(getCookie("persistUser") || getCookie("user"))
    {
        
        return true;
    }
    else
    {
        return false;
    }
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = decodeURIComponent(document.cookie).split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
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
   // refresh();

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

function reloadEvents()
{
    location.reload();
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

function populateField()
{
      $.ajax({

                type:'POST',
                url: 'getFields.php',
                data: {id: 0},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  

                    $("#fieldList").html(res);
                }


          });
}

function simpleSearch()
{
    
    var l = document.getElementById("simplesearch").value;
     $.ajax({

                type:'POST',
                url: 'simpleSearch.php',
                data: {event: l},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  
                    $("#event").html(res);
                }


          });
}


function advancedSearch()
{
     var datef = document.getElementById("date_from").value;
     var datet = document.getElementById("date_till").value;
     var field = document.getElementById("field").value;
     var area = document.getElementById("area").value;

     $.ajax({

                type:'GET',
                url: 'searchEvent.php',
                data: {date_from: datef,date_till: datet,field: field, area: area},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  
                   
                    $("#event").html(res);
                }


          });
}

function clearResult(id)
{
    var parent = document.getElementById("event");
    parent.removeChild(id);
   

    $.ajax({

                type:'POST',
                url: 'norefresh.php',
                data: {data: parent},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                  
                    alert(res);
                    $("#event").html(res);
                }


          });
}

function getUserData()
{
    var id;
    if(readCookie("persisrUser"))
    {
        id = JSON.parse(getCookie("persistUser"));
    }
    else if(readCookie("user"))
    {
        id = JSON.parse(getCookie("user"));
    }

        
         $.ajax({

                type:'POST',
                url: 'getUserData.php',
                data: {data: id[0]},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                    
                   var ar = JSON.parse(res);
                   $("#name").html(ar[1]);
                   $("#email").html(ar[3]);
                   $("#sname").html(ar[2]);
                   $("#username").html(ar[0]);

                }


          });
    

}

function getCookie(name) {
  var value = "; " + decodeURIComponent(document.cookie);
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

function updateUser(id,arr)
{
    var o = JSON.parse(id);
    var nrr = [o[0],arr[0],arr[1],arr[2]];
    
         $.ajax({

                type:'POST',
                url: 'updateUser.php',
                data: {data: JSON.stringify(nrr)},
                cache: true,
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                },
                success: function(res)
                {
                    
                   refresh();

                }


          });
}





$(document).ready(function() {

            
            webshim.polyfill();
            $("#logout_user").click(function(){
                logout();
            });

            $('#signupbtn').on('click', function(event) {
                    selectDefault("signup"); // To prevent following the link (optional)
            });
            $('#signinbtn').on('click', function(event) {
                    selectDefault("signin"); // To prevent following the link (optional)
            });

            $('#advanced').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        advancedSearch();
    });

   $('#dashTab').on('click', function(event) {
                    if(!(isLoggedin()))
                    {
                 event.stopImmediatePropagation();
                 display("Not Logged-In");
                    }
            });

            
   


});