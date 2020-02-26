
$(document).ready(function(){

    var div = $('.set_infos');
  
    // click affichage formulaire infos
    $('.btn_display_infos').click(function() { 
        $('#block_set_infos').show();
        $(this).hide();
        $('#msg_errors_infos').hide();
        $('.background_modal').css({
            "display" : "block"
        }); 

        // if ($('.btn_display_infos').css('display') == 'none'){ 
        //     console.log('cartman');
        //     $(document).click(function(event) { 
        //         if(!$(event.target).closest('.set_infos').length){
        //             // le clic est en dehors de #element
        //             $('.set_infos').hide();
        //             $('.btn_display_infos').show();
        //             $('body').css({ 
        //                 "background-color": "#c3cae830",
        //                 "color": "black"
        //             });
        //             $('.btn_display_password').css({
        //                 "color": "black",
        //                 "background-color": "#ffff"
        //             })
        //             $('.btn_display_password').removeAttr("disabled");
        //         }
        //     });
        // }
    })

    
    
    // fonction de validation du mail
    function isMail(mail) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        console.log(regex)
        if(!regex.test(mail)) {

          return false;
        }else{
          return true;
        };
    }      
 
    // afficher bouton modifier / cacher la div de modif des infos Admin
     
        $('#btn_infosP').click(function(){

            var setName = $('#set_name').val();
            var setFirstName = $('#set_firstName').val();
            var setMail = $('#set_mail').val(); 
            // if (isMail(setMail) != true){
            //     $('.block_msg_errors').show();
            //     $('#msg_errors_infos').html("l'adresse mail est incorrect </br>")
            //     $('#msg_errors_infos').show();
            // }
            // if (setName === "" || setFirstName === ""){
            //     $('.block_msg_errors').show();
            //     $('#msg_errors_infos').html("veuillez remplir le ou les champs vides")
            //     $('#msg_errors_infos').show();

            // }
            // if (isMail(setMail) != false && setName != "" && setFirstName != ""){                
                $.ajax({
                    url : 'index.php?action=setAdmin&name=' + setName + '&firstname=' + setFirstName + '&mail=' + setMail,
                    type : 'GET',
                    dataType : 'html',
                    success :  function(code_html, statut){ // success est toujours en place, bien sûr !                        
                            $('#msg_errors_infos').show();
                            $('#msg_errors_infos').html(code_html);
                            if ($('#msg_errors_infos').html() == "vos informations ont bien été modifiés"){ 
                                $('#msg_errors_infos').fadeIn(500, function(){
                                    $('.background_modal').delay(3000).fadeOut(1000);             
                                    $('#block_set_infos').delay(3000).fadeOut(1000);
                                }).delay(5000).fadeOut();
                                $('.btn_display_infos').show();
                                setName = $('#set_name').val('');
                                setFirstName = $('#set_firstName').val('');
                                setMail = $('#set_mail').val('');
                            }
                    },
                    error : function(resultat, statut, erreur){
                        alert('error');
                    }
                });
               
            // }
       
        })
    

    // click validation formulaire infos
  
    // click affichage formulaire mot de passe
    $('.btn_display_password').click(function() { 
        $('#block_set_password').show();
        $(this).hide();
         $('#msg_errors_password').hide();
        $('.background_modal').css({
            "display" : "block"
        });
    })
    $('.background_modal').click(function(){
        $('.background_modal').css({
            "display" : "none"
        });
        $('#block_set_password').hide();
        $('#block_set_infos').hide();
        $('.btn_display_password').show();
        $('.btn_display_infos').show();
    })


    // click validation formulaire mot de passe
    $("#btn_password").click(function() {
        var currentPass = $('#current_password').val();
        var newPass = $('#new_password').val();
        var confirmPass = $('#confirm_password').val();
        $.ajax({
            url : 'index.php?action=setAdmin&currentpassword=' + currentPass + '&newpassword=' + newPass + '&confirmpassword=' + confirmPass,
            type : 'GET',            
            dataType : 'html',
            success :   function(code_html, statut){ // success est toujours en place, bien sûr !
                $('#msg_errors_password').show();
                $('#msg_errors_password').html(code_html);
                if($('#msg_errors_password').html() === "le mot de passe à bien été modifié"){ 
                    $('#msg_errors_password').fadeIn(500, function(){
                        $('.background_modal').delay(3000).fadeOut(2000);
                        $('#block_set_password').delay(3000).fadeOut(2000);
                    });
                    $('.btn_display_password').show();
                    currentPass = $('#current_password').val('');
                    newPass = $('#new_password').val('');
                    confirmPass = $('#confirm_password').val('');                    
                }
            }
        })
                
     
    });
    // afficher bouton modifier / cacher la div de modif du mot de passe
 
});

