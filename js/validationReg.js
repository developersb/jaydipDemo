$(document).ready(function()
  {   

        $("#firstname").on("keydown keyup change", function(){
          var value = $(this).val();
          if (value.length > 8)
            $("#fname").text("Firstname is too long!");
          else
            $("#fname").text("");
        });

        $("#lastname").on("keydown keyup change", function(){
          var lvalue = $(this).val();
          if (lvalue.length > 8)
            $("#lname").text("Lastname is too long!!");
          else
            $("#lname").text("");  
        });

        $("#username").on("keydown keyup change", function(){
          var uvalue = $(this).val();
          if (uvalue.length > 8)
            $("#uname").text("Username is too long!!");
          else
            $("#uname").text("");  
        });

        $("#password").on("keydown keyup change", function(){
          var pvalue = $(this).val();
          if (pvalue.length < 6)
            $("#passw").text("Password must be at least 6 characters long!!");
          else
            $("#passw").text("");  
        });

        $("#cpassword").on("keydown keyup change", function(){

          var pass = $('#password').val();
          var cpass=$('#cpassword').val();               
          if (pass!=cpass)
          {
            $("#cerpass").text("Passwords do not match!!");
          }
          else
          {
            $("#cerpass").text("");  
          }

          if(cpass.length <= 6)
          {
            $("#cpass").text("Password must be at least 6 characters long!!");
          }
          else
          {
            $("#cpass").text("");  
          }

        });


        $.validator.addMethod("alphabetsnspace", function(value, element) {
          return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        });

        $.validator.addMethod("emailnvalid", function(value, element) {
          return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
        });

        $.validator.addMethod("pwcheck", function(value, element) {
         return this.optional(element) || /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/.test(value);
       });

        $.validator.addMethod("checkYear", function(value, element) {

          var dt = new Date( $(element).val());
          year=dt.getFullYear();
          return (year > 2000) && (year <= (new Date()).getFullYear());
        });

        /*$("form[name='registration']").validate({*/

          //$("#registration").submit(function(e) {
          
          $("form[name='registration']").submit(function(e) {
              e.preventDefault();
          }).validate({

          rules:
          {

            firstname: 
            {
              required: true,
              alphabetsnspace: true
            },
            lastname: 
            {
              required: true,
              alphabetsnspace: true
            },

            username:"required",
            country:"required",
            city:"required",
            'gender[]':{ required:true },
            birthday:{
              required: true,
              checkYear: true
            },
            email: {
              required: true,
              emailnvalid: true
            },
            password: {
              required: true,
              pwcheck: true
            },
            cpassword: {
              required: true,
              pwcheck: true
            },
          },

          messages: 
          {
            "firstname":{
              alphabetsnspace: "Please Enter Only Letters",
              required: "Please enter your firstname"
            },   
            "lastname":{
              alphabetsnspace: "Please Enter Only Letters",
              required: "Please enter your lastname"
            },
            "username":{
              alphabetsnspace: "Please Enter Only Letters",
              required: "Please enter your username"
            },
            "cpassword":{
              cpassword:"Password are not matching",
              required:"Please enter confirm Password",
              pwcheck:"Password must be contain (A-a-9-$)"
            },
            country:"Please select country",
            city:"Please select city",
            'gender[]':"Please select gender",
            birthday:{
              required:"Please enter birthdate",
              checkYear: "Check valid year 2000-Current Year"
            },
            password: {
              required: "Please enter a password",
              pwcheck:"Password must be contain (A-a-9-$)"
            },
            email: 
            {
              emailnvalid:"Please enter a valid email",
            },

          },


          submitHandler: function(form) 
          { 
       
            var data = $("#registration").serialize();

            $.ajax({

              type: "POST",
              data: data,
              dataType: "json",
              url: "backend/controller.php",

              success: function(dataResult){
                window.location="index2.php"; 
                                }
             });  

            }


        });  


    });