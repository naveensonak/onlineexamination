function echeck(str) {
    var at="@";
    var dot=".";
    var lat=str.indexOf(at);
    var lstr=str.length;
    var ldot=str.indexOf(dot);
    if (str.indexOf(at)==-1){
        $("#loginerr").html('Invalid E-mail ID');
        return false;
    }
    
    if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
    $("#loginerr").html('Invalid E-mail ID');
        //alert("Invalid E-mail ID");
        return false;
    }
    if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
       $("#loginerr").html('Invalid E-mail ID');
        return false;
    }
    if (str.indexOf(at,(lat+1))!=-1){
       $("#loginerr").html('Invalid E-mail ID');
        return false;
    }
    if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
       $("#loginerr").html('Invalid E-mail ID');
         return false;
    }
    if (str.indexOf(dot,(lat+2))==-1){
        $("#loginerr").html('Invalid E-mail ID');
        return false;
    }
    if (str.indexOf(" ")!=-1){
        $("#loginerr").html('Invalid E-mail ID');
        return false;
    }
    return true;
}
$(document).ready(function () { 

$("#signup").submit(function(e) {
// debugger;
e.preventDefault();
var name = $('input#studentname').val();
var email = $('input#studentemail').val();
var mobile = $('input#mobile').val();
var password = $('input#password').val();
var acceptTC = $('input#acceptTC').val();
var s_class = $('input#studentclass').val();
var school = $('input#studentschool').val();
var math = $('input#math').val();
var science = $('input#science').val();

if((name) =="") {
$("input#studentname").focus();
return false;}
if (echeck(email)== "") {
$("input#studentemail").focus();
return false;}

if ((mobile)== "") {
$("input#mobile").focus();
return false;}

if ((password)== "") {
$("input#password").focus();
return false;}

if ($('#acceptTC').is(':checked')) {document.getElementById('chk').innerHTML =('');}
else {document.getElementById('chk').innerHTML = ('<font size="2" style="color:#a93638;">please check terms & conditions</font>'); return false;}

if ((s_class)== "") {
$("input#studentclass").focus();
return false;}
if ((school)== "") {
$("input#studentschool").focus();
return false;}
if ((math)== "") {
$("input#math").focus();
return false;}                         
if ((science)== "") {
$("input#science").focus();
return false;}                        



$.ajax({

type: "POST",  
url: "signupNow.php",              
data: {name:name ,
    email:email,
    mobile:mobile,
    password:password,
    acceptTC:acceptTC,
    s_class:s_class,
    school:school,
    math:math,
    science:science}, 

success: function(html)   
{ 
// alert(html);
// console.log('>>>>>>>>',html);
if (html == 1) {

$("#signup")[0].reset();
document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#090;">Register Sucessfully.. Verification Link Send To Your Email.</font>');

}			
else if(html==2)
{ document.getElementById('exist').innerHTML = ('<font size="2" style="color:#f00;">Email Id Allready Register With Us!</font>');
}
else if(html==0)
{ document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#f00;">Oops..Some Technical Error..</font>');
}

}
});

});
//===========================login script==================================================================	

$("#loginform").on('submit',(function(e) {
e.preventDefault();
var username = $('input#loginemail').val();
var loginpassword = $('input#loginpassword').val();
var seriesid = $('input#seriesid').val();
var qbankid = $('input#qbankid').val();
// var olympiad = $('input#olympiad').val();
var questa = $('input#questa').val();

if ((username)== "") {
$("input#loginemail").focus();
$('#loginemail').css({'border-color': '#f00'});
return false;}			

if ((loginpassword)== "") {
$("input#loginpassword").focus();
$('#loginpassword').css({'border-color': '#f00'});
return false;}

$.ajax({
type: "POST", 
url: "loginNow.php",              
data: new FormData(this), 
contentType: false,       
cache: false,             
processData:false,       

success: function(html)   
{ //alert(html);
if (html == 1) {
window.location.href = "myprofile.php";
}			
else if (html == 2) {
window.location.href = "series-details.php?seriesid="+seriesid;
}
else if (html == 3) {
window.location.href = "question-bank-details.php?qbankid="+qbankid;
}
else if (html == 4) {
// window.location.href = "olympiads-details.php?olympiadsid="+olympiad;
window.location.href = "questa-details.php?questaid="+questa;
}
else if(html==0)
{ document.getElementById('error').innerHTML = ('<font size="2" style="color:#f00;">Wrong Username or Password !</font>');
}

}
});

}));


});

//=============================signin using google===========================================
function onSignIn(googleUser) { 
var profile = googleUser.getBasicProfile();
var auth2 = gapi.auth2.getAuthInstance();
var seriesid = $('input#seriesid').val();
var qbankid = $('input#qbankid').val();
var olympiad = $('input#olympiad').val();

if(profile){

$.ajax({
type: 'POST',
url: 'googleLoginSignup.php',
data: {id:profile.getId(), name:profile.getName(), loginemail:profile.getEmail(),photo:profile.getImageUrl(),authtype:'google',seriesid:seriesid,qbankid:qbankid,olympiad:olympiad}
}).done(function(data){ 
auth2.disconnect();
if (data == 1) {
window.location.href = "myprofile.php";
}			
else if (data == 2) {
window.location.href = "series-details.php?seriesid="+seriesid;
}
else if (data == 3) {
window.location.href = "question-bank-details.php?qbankid="+qbankid;
}
else if (data == 4) {
// window.location.href = "olympiads-details.php?olympiadsid="+olympiad;
window.location.href = "questa-details.php?questaid="+questa;
}
else if(data==0)
{ document.getElementById('error').innerHTML = ('<font size="2" style="color:#f00;">Wrong Username or Password !</font>');
}
});
}

}


//=======================signin with facebook===================================
window.fbAsyncInit = function() {
FB.init({
appId            : '301808030531365',
autoLogAppEvents : true,
xfbml            : true,
version          : 'v3.2'
});
};

(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/all.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
// Load the JavaScript SDK asynchronously

// Facebook login with JavaScript SDK
function fbLogin() {
FB.login(function (response) {
if (response.authResponse) {
// Get and display the user profile data
getFbUserData();
} else {
document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
}
}, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){

FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
function (response) {
var name=response.first_name+' '+response.last_name;
var seriesid = $('input#seriesid').val();
var qbankid = $('input#qbankid').val();
var olympiad = $('input#olympiad').val();

$.ajax({
type: 'POST',
url: 'googleLoginSignup.php',
data: {id:response.id, name:name, loginemail:response.email,photo:response.picture.data.url,authtype:'facebook',seriesid:seriesid,qbankid:qbankid,olympiad:olympiad}
}).done(function(data){ 
//auth2.disconnect();
if (data == 1) {
window.location.href = "myprofile.php";
}			
else if (data == 2) {
window.location.href = "series-details.php?seriesid="+seriesid;
}
else if (data == 3) {
window.location.href = "question-bank-details.php?qbankid="+qbankid;
}
else if (data == 4) {
// window.location.href = "olympiads-details.php?olympiadsid="+olympiad;
window.location.href = "questa-details.php?questaid="+questa;
}
else if(data==0)
{ document.getElementById('error').innerHTML = ('<font size="2" style="color:#f00;">Wrong Username or Password !</font>');
}
});	

});
}

// Logout from facebook
//function fbLogout() {
//    FB.logout(function() {
//        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
//        document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
//        document.getElementById('userData').innerHTML = '';
//        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
//    });
//}       var questa = $('input#questa').val();
//        window.location.href = "questa-details.php?questaid="+questa;
