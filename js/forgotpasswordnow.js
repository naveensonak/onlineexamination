$(document).ready(function () { 
		$("#forgotpasswordnow").on('submit',(function(e) {
		e.preventDefault();

		$.ajax({
			      
			type: "POST", 
			url: "reset_passwordNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
				alert("Password Changed Successfully !");
			window.location.href = 'index.php';
			}
			else if (html == 11) {
			window.location.href = 'error.php?error=4';
			}
			
			else if(html==0)
			{ 	
			document.getElementById('eros').innerHTML = ('<font size="2" style="color:#f00;">Oops..Some Technical Error..</font>');
				}else if (html == 2) {
			document.getElementById('eros').innerHTML = ('<font size="1" style="color:#f00;">Confirmed Password Not Matched</font>');
            
			}
			
			}
		});
	
	}));
	
	
	
});

