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
		$("#reviewform").on('submit',(function(e) {
		e.preventDefault();
var rname = $('input#rname').val();
var remail = $('input#remail').val();
var rcomment = $('textarea#rcomment').val();


if ((rname)== "") {
            $("input#rname").focus();
			$('#rname').css({'border-color': '#f00'});
            return false;}

if (echeck(remail)== "") {
            $("input#remail").focus();
			$('#remail').css({'border-color': '#f00'});
            return false;}
			
if ((rcomment)== "") {
	$("textarea#rcomment").focus();
			$('#rcomment').css({'border-color': '#f00'});
            return false;}

		$.ajax({
			type: "POST", 
			url: "reviewNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#reviewform")[0].reset();
document.getElementById('rsucess').innerHTML = ('<font  size="2" color="#090">Thank you...Your Form has been successfully submitted! </font>');
			}			
			else if(html==0)
			{ document.getElementById('rsucess').innerHTML = ('Oops..Some Technical Error..');
				}
			
			}
		});
	
	}));
	
	
});

