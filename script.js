

function validateform_register()
{
    let name = document.forms["register_form"]["name"].value;
    let username = document.forms["register_form"]["username"].value;
    let email = document.forms["register_form"]["email"].value;
    let password = document.forms["register_form"]["password"].value;
    let confirm_password = document.forms["register_form"]["confirm_password"].value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let user_stay=0;
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');

    if(name=='')
    {
        document.getElementById('warning').innerHTML="Name is not valid";
        return false;
    }

    if(!email.match(mailformat))
    {
        document.getElementById('warning').innerHTML="Email is not valid";
        return false;
    }
    if(password != confirm_password)
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
    if (username!='')
    {
        $.ajax({
            async:false,
            url: '../controller/Backend_things_show.php',
            type: 'post',
            
            data: {
                username: username,type:'register_page'
            },
            success: function(data)
                {
                    if (data.length>6)
                    {    
                    console.log('4');
                    user_stay=1;
                    document.getElementById('warning').innerHTML=data;
                    return false;
                    }
                    else{
                        //console.log('5');
                        user_stay=0;
                        //return true;
                    }
                }
                
        } )
        if(user_stay==1){
            return false;
        }      
    }  
}


function validateform_login()
{
    let username = document.forms["login_form"]["username"].value;
    let user_stay=0;
    let password = document.forms["login_form"]["password"].value;
    if (username == "") {
        document.getElementById('warning').innerHTML="Enter username";
        return false;
    }
    if(password=="")
    {
        document.getElementById('warning').innerHTML="Enter password";
        return false;
    }
    if (username!='')
    {
        $.ajax({
            async:false,
            url: '../controller/Backend_things_show.php',
            type: 'post',
            
            data: {
                username: username,type: 'login_page',password:password },
            success: function(data)
                {
                    if (data.length>6)
                    {    
                    console.log('4');
                    user_stay=1;
                    document.getElementById('warning').innerHTML=data;
                    return false;
                    }
                    else{
                        //console.log('5');
                        user_stay=0;
                        //return true;
                    }
                }
                
        } )
        if(user_stay==1){
            return false;
        }

    }

}

function validate_edit_profile()
{
    let name = document.forms["edit_profile"]["name"].value;
    let email = document.forms["edit_profile"]["email"].value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(name=='')
    {
        document.getElementById('warning').innerHTML="Name is not valid";
        return false;
    }
    if(!email.match(mailformat))
    {
        document.getElementById('warning').innerHTML="Email is not valid";
        return false;
    }
   // console.log("hei");
}


function validate_change_password(){
    let current_password = document.forms["change_password_form"]["current_password"].value;
    let password = document.forms["change_password_form"]["password"].value;
    let user_stay=0;
    let confirm_password = document.forms["change_password_form"]["confirm_password"].value;
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');
    console.log("hii");
    if(password != confirm_password)
    {
        document.getElementById('warning').innerHTML="Both password will be same";
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

    if (current_password!='')
    {
        $.ajax({
            async:false,
            url: '../controller/Backend_things_show.php',
            type: 'post',
            
            data: {
                type: 'change_password_page',current_password:current_password },
            success: function(data)
                {
                    if (data.length>6)
                    {    
                    console.log('4');
                    user_stay=1;
                    document.getElementById('warning').innerHTML=data;
                    return false;
                    }
                    else{
                        console.log('5');
                        user_stay=0;
                        //return true;
                    }
                }
                
        } )
        if(user_stay==1){
            return false;
        }

    }



}



$(document).ready(function(){
    $("#stone").click(function()
    {
        $.ajax({
         
            url: "../controller/Game.php",
            method:"post",
            data:{'choice':"1"},
            success:function(data)
            {
                if(data=="-1"){
                    window.location.replace('view/Login.php');
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
            url:"../controller/Game.php",
            method:"post",
            data:{'choice':"2"},
            success:function(data)
            {
                if(data=="-1"){
                    window.location.replace('view/Login.php');
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
            url:"../controller/Game.php",
            method:"post",
            data:{'choice':"3"},
            success:function(data)
            {
                if(data=="-1"){
                    window.location.replace('view/Login.php');
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
           url: '../controller/Get_User_Detail',
           type: 'GET',
           data: {
               username: someusername
           },
           success: (data) => 
           {
               window.location = '/User_Detail';
   
           }
       })
   })
    
})




