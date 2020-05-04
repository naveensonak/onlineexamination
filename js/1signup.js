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
		$("#signup").on('submit',(function(e) {
		e.preventDefault();
var name = $('input#name').val();
var email = $('input#email').val();
var mobile = $('input#mobile').val();
var password = $('input#password').val();
if((name) =="") {
            $("input#name").focus();
            return false;}
if (echeck(email)== "") {
            $("input#email").focus();
            return false;}
			
if ((mobile)== "") {
            $("input#mobile").focus();
            return false;}

if ((password)== "") {
            $("input#password").focus();
            return false;}

if ($('#acceptTC').is(':checked')) {document.getElementById('chk').innerHTML =('');}
                else {document.getElementById('chk').innerHTML = ('<font size="2" style="color:#a93638;">please check terms & conditions</font>'); return false;}

		$.ajax({
			      
			type: "POST", 
			url: "signupNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#signup")[0].reset();
		document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#090;">Registered Sucessfully. Please Login.</font>');
            
			}			
			else if(html==2)
			{ document.getElementById('exist').innerHTML = ('<font size="2" style="color:#f00;">Email Id Allready Register With Us!</font>');
				}
			else if(html==0)
			{ document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#f00;">Oops..Some Technical Error..</font>');
				}
			
			}
		});
	
	}));
//===========================login script==================================================================	

		$("#loginform").on('submit',(function(e) {
		e.preventDefault();
var username = $('input#loginemail').val();
var loginpassword = $('input#loginpassword').val();
var seriesid = $('input#seriesid').val();
var qbankid = $('input#qbankid').val();
var olympiad = $('input#olympiad').val();
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
			window.location.href = "olympiads-details.php?olympiadsid="+olympiad;
			}
			else if(html==0)
			{ document.getElementById('error').innerHTML = ('<font size="2" style="color:#f00;">Wrong Username or Password !</font>');
				}
			
			}
		});
	
	}));

	
});

