$(document).ready(function () {


   if ($('#msg_mail').html() != "") {
      $('#msg_mail').show();
      $("#mail").focusin(function () {
         $('#msg_mail').html("");
         $('#msg_mail').hide();
      })
   } else {
      $('#msg_mail').hide();
   }
   if ($('#msg_pass').html() != "") {
      $('#msg_pass').show();

      $("#password").focusin(function () {
         $('#msg_pass').html("");
         $('#msg_pass').hide();
      })
   } else {
      $('#msg_pass').hide();
   }
})