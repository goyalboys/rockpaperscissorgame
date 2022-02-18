function validateform()
{
    let name = document.forms["myForm"]["name"].value;
    let username = document.forms["myForm"]["username"].value;
    let email = document.forms["myForm"]["email"].value;
    let password = document.forms["myForm"]["pwd"].value;
    let cpassword = document.forms["myForm"]["cnfrpwd"].value;
    if(password !=cpassword)
    {
        document.getElementById('warning').innerHTML="Both password will be same";
        return false;
    }
    if (username == "") 
    {
        document.getElementById('warning').innerHTML="username is mandatory";
        return false;
    }
    if(password=="")
    {
        document.getElementById('warning').innerHTML="please enter password";
        return false;
    }
}
function showHint(str) 
{
    if (str.length == 0)
    {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "game.php?choice=" + str, true);
        xmlhttp.send();
    }
}

function validateforml(){
    let username = document.forms["myForm"]["username"].value;
    let password = document.forms["myForm"]["pswd"].value;
    if (username == "") {
        document.getElementById('warning').innerHTML="Enter username";
        return false;}
    if(password=="")
    {
        document.getElementById('warning').innerHTML="Enter password";
        return false;
    }
}



function loaddok() {
    console.log("hi");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "game.php?choice="+"1", true);
    xhttp.send();
  }
  function trysd(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("username").innerHTML = this.responseText;
     //console.log(this.responseText);
    }
  };
  xhttp.open("GET", "users.php", true);
  xhttp.send();
  }
/*
  $(document).ready(function(){
   $("#btn").click(function()
    {
        $.ajax({
            url:"try.php",
            method:"post",
            data:{'1':"vineetgoyalhdfbvfbvhbfvjbdjvbhdvbjhfbvhjd"},
            success:function(data){
             console.log(data);
             var he = JSON.parse(data);
             console.log(he);
             let el=document.getElementById("new");
             el.innerHTML="<ul>";
             for (let i = 0; i < he.length; i++) {
                    //document.getElementById("new").innerHTML+=data[i];
                   // document.getElementById("new").innerHTML+="<li>";
                     
                     el.innerHTML += "<br>"+"<li> <a href='#'>"+he[i]+"</a></li>";
                    //console.log(he[i]);
                    //document.getElementById("new").innerHTML+="<br>";
                     }
               // console.log("hello");
               el.innerHTML+="</ul>";
            }
        })

    })
})
*/

$(document).ready(function(){
          $.ajax({
              url:"user.php",
              method:"post",
              data:{'1':"vineetgoyalhdfbvfbvhbfvjbdjvbhdvbjhfbvhjd"},
              success:function(data){
               //console.log(data);
               $('#new').html(data);//for class use.
              }
          })
  
  })




  $(document).ready(function(){
    $("#stone").click(function()
     {
         $.ajax({
            url:"game.php",
            method:"post",
            data:{'choice':"1"},
            success:function(data){
            console.log(data);
             //let x,y,z=data.split("-");
             const myArray = data.split("-");
              //console.log(myArray);
            $('#result').html(myArray[0]);
             $('#computer').html(myArray[1]);//for class use.
             $('#user').html(myArray[2]);

             $('#uloose').html(myArray[6]);
             $('#cloose').html(myArray[5]);
             $('#cwin').html(myArray[6]);
             $('#uwin').html(myArray[5]);
             $('.total').html(myArray[3]);
             $('.tie').html(myArray[4]);

            }
         })
 
     })
 })
 

 
 $(document).ready(function(){
    $("#paper").click(function()
     {
         $.ajax({
            url:"game.php",
            method:"post",
            data:{'choice':"2"},
            success:function(data){
                   const myArray = data.split("-");
              //console.log(myArray);
            $('#result').html(myArray[0]);
             $('#computer').html(myArray[1]);//for class use.
             $('#user').html(myArray[2]);

             $('#uloose').html(myArray[6]);
             $('#cloose').html(myArray[5]);
             $('#cwin').html(myArray[6]);
             $('#uwin').html(myArray[5]);
             $('.total').html(myArray[3]);
             $('.tie').html(myArray[4]);
            }
         })
 
     })
 })
 $(document).ready(function(){
    $("#scissor").click(function()
     {
         $.ajax({
            url:"game.php",
            method:"post",
            data:{'choice':"3"},
            success:function(data){
                   const myArray = data.split("-");
              console.log(myArray[3]);
            $('#result').html(myArray[0]);
             $('#computer').html(myArray[1]);//for class use.
             $('#user').html(myArray[2]);
             $('#uloose').html(myArray[6]);
             $('#cloose').html(myArray[5]);
             $('#cwin').html(myArray[6]);
             $('#uwin').html(myArray[5]);
             $('.total').html(myArray[3]);
             $('.tie').html(myArray[4]);
             

            }
         })
 
     })

    })


     
     
     $(document).ready(function(){

     $("#clickme").click(function(){
        $.ajax({
            url: '/userdetail',
            type: 'GET',
            data: {
                username: someusername
            },
            success: (data) => {
                    window.location = '/userdetail';
    
            }
        })
    })





     
     
 } )