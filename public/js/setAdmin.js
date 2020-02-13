
$(document).ready(function(){

    var div = $('.set_infos');
  
    // click affichage formulaire infos
    $('.btn_display_infos').click(function() { 
        $('#block_set_infos').show();
        $(this).hide();
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
        console.log(setName);
        // if ($.trim(setName).length > 0 && $.trim(setFirstName).length > 0 && isMail(setMail) == true){
        //     console.log(setName);

            $.ajax({
                url : 'index.php?action=setAdmin&name=' + setName + '&firstname=' + setFirstName + '&mail=' + setMail,
                type : 'GET',
                dataType : 'html',
                success : function(code_html, statut){ // success est toujours en place, bien sûr !
                    $('#msg_errors_infos').show();
                    $('#msg_errors_infos').html(code_html);
                    $('#msg_errors_infos').fadeIn().delay(4000).fadeOut();
                    $('.background_modal').css({
                        "display" : "none"
                    });
                    $('#block_set_infos').hide();
                    $('.btn_display_infos').show();


                },

                error : function(resultat, statut, erreur){
                    alert('error');
                }
            });
            setName = $('#set_name').val('');
            setFirstName = $('#set_firstName').val('');
            setMail = $('#set_mail').val('');
        // }
        // else{
        //     console.log('erreur');
        // }
        console.log('superman');   
    })


    // click validation formulaire infos
  
    // click affichage formulaire mot de passe
    $('.btn_display_password').click(function() { 
        $('#block_set_password').show();
        $(this).hide();
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
                $('#msg_errors_password').fadeIn().delay(4000).fadeOut();
                $('.background_modal').css({
                    "display" : "none"
                });
                $('#block_set_password').hide();
                $('.btn_display_password').show();
            }
        })
        // $.ajax({
        //     url : 'public/mdp.php',
        //     type : 'GET',            
        //     dataType : 'html',
        //     success :   function(code_html, statut){ // success est toujours en place, bien sûr !
        //         var data = JSON.parse()
        //         if (data.password == currentPass){
        //             if ($.trim(currentPass).length > 4 && $.trim(newPass).length > 4 && confirmPass == newPass){
        //                 $('.set_password').hide();
        //                 $('.btn_display_password').show();
        //                 $('body').css({ 
        //                     "background-color": "#c3cae830",
        //                     "color": "black"
        //                 })
        //                 $('.btn_display_infos').css({
        //                     "color": "black",
        //                     "background-color": "#ffff"
        //                 })
        //                 $('.btn_display_infos').removeAttr("disabled");
        //                 $.ajax({
        //                     url : 'index.php?action=setAdmin&current_password=' + currentPass + '&new_password=' + newPass + '&confirm_password=' + confirmPass,
        //                     type : 'GET',
        //                     dataType : 'html',
        //                     success : function(code_html, statut){ // success est toujours en place, bien sûr !
        //                         console.log('hulk');
        //                     },
            
        //                     error : function(resultat, statut, erreur){
        //                         alert('error');
        //                     }
        //                 }); 
        //                 CurrentPass = $('#current_pass').val('');
        //                 newPass = $('#new_password').val('');
        //                 ConfirmPass = $('#confirm_password').val('');      
        //             }
        //             else{
        //                 console.log('raté');
        //             }
        //     }
        //     }
        // })
      

     
    });
    // afficher bouton modifier / cacher la div de modif du mot de passe
 
});

