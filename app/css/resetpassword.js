

$(document).ready(function () {

    // --------------------------------   login page function start-----------------------------
    $("#reset-submit").click(function () { 
        // we want to store the values from the form input box, then send via ajax below  
        var newpassword = $('input#newpassword').val();
		var cpassword = $('input#cpassword').val();
        var token = $('input#token').val();
		//alert(newpassword);
    if (newpassword=="") 
		{alert("Enter Your New Password");  
			$("input#newpassword").focus();  
			return false;}    
       if (cpassword=="")
	   {alert("Confirm Password");
		$("input#cpassword").focus();  
			return false;}
			
		
			         
        $.ajax({
            type: "POST",
            url: "reset_password.php",
            data: "newpassword=" + newpassword + "& cpassword=" + cpassword + "& token=" + token,
            success: function (html) {
           //alert(html);
                if (html == 1) {
                //alert('Thank You For Your Interest....')
				window.location.href = 'error.php?error=3';					
                } else if (html == 0) {
                  alert('Form Not Submitted ! Due To Some Technical Problem.....');

                } 
				
				else if (html == 2) {
                  alert('Confirm Password Not Matched');

                } 
				else if (html == 3) {
                  alert('Parametere Empty');

                } 
            }
        });
        return false;
    });
    // --------------------------------   login page function end -----------------------------
});

