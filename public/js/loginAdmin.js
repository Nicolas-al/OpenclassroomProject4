$(document).ready(function(){

    
     if($('#msg_mail').html() != ""){
        $('#msg_mail').show();

        // $("#mail").keypress(function() {
        //     console.log( "Handler for .keypress() called." );
        //     $('#msg_mail').val("");
        //     $('#msg_mail').hide();
        //   });

          $("#mail").focusin(function(){
                  console.log('wwwww');
                $('#msg_mail').html("");
                $('#msg_mail').hide();
             
          })
     }
     else{
         console.log('hallo');
        $('#msg_mail').hide();
     }
     if($('#msg_pass').html() != ""){
        console.log('salut');
        $('#msg_pass').show();
        // $("#password").keypress(function() {
        //     console.log( "Handler for .keypress() called." );
        //     $('#msg_pass').hide();
        //   });
        $("#password").focusin(function(){
            console.log('wwwww');
            $('#msg_pass').html("");
            $('#msg_pass').hide();
       
    })
     }
     else{
        $('#msg_pass').hide();
     }

     
      
      
})