function onSignIn(googleUser)
{
  var profile=googleUser.getBasicProfile();
  $(".g-signin2").css("display","none");
  $(".data").css("display", "block");
  $("#pic").attr('src',profile.getImageUrl());
  $("#email").text(profile.getEmail());
  var id_token = profile.getEmail();
  $("#token").text(id_token);

}

function verify_in_server() {

  type: "POST",
  url: "verify.php",
  data: { token: $("#token").text()},
  success: function(result){
      	    $("#verify_in_server_result").html(result);
     }
  }




// function verify_in_server_result() {
//   $("#verify_in_server_result").text(result);
//
// }



function signOut()
{
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function(){
    alert("You have been successfully signed out");
    $(".g-signin2").css("display","block");
    $(".data").css("display", "none");

  });
}
