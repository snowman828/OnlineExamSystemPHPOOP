$(document).ready(function(){
  //for User Regi
   $("#submit").click(function(){
     var userName=$("#userName").val();
     var name=$("#name").val();
     var userPass=$("#userPass").val();
     var userEmail=$("#userEmail").val();
     var ruserPass=$("#ruserPass").val();
     var dataString='userName='+userName+'&name='+name+'&userPass='+userPass+'&ruserPass='+ruserPass+'&userEmail='+userEmail;
     
     $.ajax({
        type:"POST",
        url:"getregister.php",
        data:dataString,
        success:function(data)
        {
           $("#state").html(data);
        }
     });
     return false;

   });
   //User Login

    $("#login").click(function(){
     var userEmail=$("#userEmail").val();
     var userPass=$("#userPass").val();
     
     var dataString='userEmail='+userEmail+'&userPass='+userPass;
     
     $.ajax({
        type:"POST",
        url:"getlogin.php",
        data:dataString,
        success:function(data)
        {
          if ($.trim(data)=="empty"){
            $('#empty').show();
            setTimeout(function(){
                $('#empty').fadeOut();
            },5000);
            
          }
          else if ($.trim(data)=="Inavlid")
           {
           
            $('#inavalid').show();
            setTimeout(function(){
                $('#inavalid').fadeOut();
            },5000);
           }
          else if ($.trim(data)=="error")
           {
     
            $('#notexixts').show();

          
            setTimeout(function(){
                $('#notexixts').fadeOut();
            },5000);
       
           }
           else if ($.trim(data)=="Disabled")
           {
         
            $('#disable').show();
            setTimeout(function(){
                $('#disable').fadeOut();
            },5000);
           }  
          else
          {
            window.location='exam.php';
          }

        }
        
     });
     return false;
      });

   });
  

