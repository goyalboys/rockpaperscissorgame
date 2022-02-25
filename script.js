function validateform_register()
{
    let name = document.forms["myForm"]["name"].value;
    let username = document.forms["myForm"]["username"].value;
    let email = document.forms["myForm"]["email"].value;
    let password = document.forms["myForm"]["pwd"].value;
    let cpassword = document.forms["myForm"]["cnfrpwd"].value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');

    if(!email.match(mailformat))
    {
        document.getElementById('warning').innerHTML="Email is not valid";
        return false;
    }
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
    if(!password.match(mediumPassword))
    {
        document.getElementById('warning').innerHTML="Password is not strong";
        return false;
    }
}
function validateforml()
{
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

$(document).ready(function(){
    $("#stone").click(function()
    {
        $.ajax({
            url:"game.php",
            method:"post",
            data:{'choice':"1"},
            success:function(data)
            {
                if(data=="-1"){
                    window.location.replace('login.html');
                }
                else{
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
            success:function(data)
            {
                if(data=="-1"){
                    window.location.replace('login.html');
                }
                else
                {
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
            success:function(data)
            {
                if(data=="-1"){
                    window.location.replace('login.html');
                }
                else
                {

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
            success: (data) => 
            {
                window.location = '/userdetail';
    
            }
        })
    })
     
} )