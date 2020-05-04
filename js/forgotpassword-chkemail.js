$(document).ready(function () { 
		$("#forgotpasswordform").on('submit',(function(e) {
		e.preventDefault();
var emailid = $('input#emailid').val();
if((emailid) =="") {
            $("input#emailid").focus();
            return false;}
		$.ajax({
			      
			type: "POST", 
			url: "forgotpassword-chkemailNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
				$('#emailid').val('');
	document.getElementById('ffsucess').innerHTML = ('<font size="2" style="color:#090;">Request Send Sucessfully.Check Your Email</font>');
            
			}else if(html==0)
			{ 	
			document.getElementById('ffsucess').innerHTML = ('<font size="2" style="color:#f00;">Oops..Some Technical Error..</font>');
				}else if (html == 2) {
			document.getElementById('ffsucess').innerHTML = ('<font size="2" style="color:#f00;">Email id not registered with us</font>');
            
			}
			
			}
		});
	
	}));
	
	
	
});

