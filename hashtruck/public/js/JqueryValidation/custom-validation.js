$.validator.addMethod('letters', function(value) {
    return value.match(/^[- a-zA-Z]+$/);
});

$(document).ready(function() {

    // registerForm validation

    $("#registerForm").validate({

        rules: 
        {
            "name": {       
                required: true,
                letters:true,
            },
            "comapny_name":{
                required: true,
            },
            "contact_no":{
                required: true,
                digits:true,
                remote: {
                url: '/phone_check',
                type: 'post',
                }
            },
            "email": {       
                required: true,
                email:true,
                remote: {
                url: '/email_check',
                type: 'post',
                }
            },

            "password": {
                required: true,
                minlength: 6
            
            },
            "confirm_password": {    
               required: true,
               minlength: 6,
               equalTo: "#password"
            },
        },

        messages: 
        {
            "name" :{
                required: 'Please enter your first name.',
                letters:'only letters are allowed.',

            },
            "comapny_name" :{
                required:'Please enter your comapny_name.',
            },

            "contact_no":{
                required:'Plese enter your contact number.',
                digits:"Only digits are required.",
                remote:"contact number is already in use."
            },
            "email":{
                required:'Please enter your email.',
                remote:'email is already in use.'
            },
            "password" :{
                required: 'Please enter new password'

            },
            "confirm_password" :{
                 required: 'Please enter confirm password',
                 equalTo: 'Confirm password must be same as new password'
             },
        },

    });

    // login form validation
    $("#loginForm").validate({
    rules: 
        {
          "email_contact":{
            required:true,
          },
          "password":{
            required:true,
          }   
        },
         messages:{
          "email_contact":{
             required:"please enter your email/contact number." 
          },
          "password":{
             required:"Please enter your password."
          }

         },   
    });

    // forgot password vaidation
    $("#forgotPassword").validate({

        rules: 
        {
            "email": {
                
                required: true,
                remote: {
                url: '/checkEmail',
                type: 'post',
           
               }
            
            },

        },

        messages: 
        {
            "email" :{
                required: 'Please enter your registered email',
                remote:'Your email is incorrect.'

            },
        },
    });

});


