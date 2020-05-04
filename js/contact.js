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
		$("#contact").on('submit',(function(e) {
		e.preventDefault();
var name = $('input#name').val();
//var mobile = $('input#mobile').val();
var email = $('input#email').val();
var subject = $('input#subject').val();
var message = $('textarea#message').val();
if((name) =="") {
            $("input#name").focus();
			$('#name').css({'border-color': '#f00'});
            return false;}
			
if (echeck(email)== "") {
            $("input#email").focus();
			$('#email').css({'border-color': '#f00'});
            return false;}			

if ((subject)== "") {
            $("input#subject").focus();
			$('#subject').css({'border-color': '#f00'});
            return false;}
			
if ((message)== "") {
            $("textarea#message").focus();
			$('#message').css({'border-color': '#f00'});
            return false;}

		$.ajax({
			      
			type: "POST", 
			url: "contactNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#contact")[0].reset();
		document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#090;">Thank You For Connecting With Us.. We will respond as quickly as we can...... </font>');
            
			}			
			
			else if(html==0)
			{ document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#f00;">Oops..Some Technical Error..</font>');
				}
			
			}
		});
	
	}));
	
	
	
});

