$(document).ready(function () {
    $("#quize_submit").click(function () {
		var strconfirm = confirm("Are you sure you want to submit your quize?");
           if (strconfirm == true) {
		submit_form();}
    });
	
	
    // --------------------------------   login page function end -----------------------------
});


function submit_form(){ 
var userid = $('input#userid').val();
var testid = $('input#testid').val();
var enctestid = $('input#enctestid').val();
var numberOfCheckedRadio = $('input:radio:checked').length;
//alert(numberOfCheckedRadio);
var radios = [];
$.each($('input[type="radio"]:checked'), function() {
radios.push($(this).val());
});
var radio=radios.join('~');
//alert(radio);
$.ajax({  
    type: "POST",  
    url: "submitdemoquizeNow.php",  
    data: "userid="+ userid+ "& testid=" + testid + "& numberOfCheckedRadio=" + numberOfCheckedRadio+ "& radio=" + radio,  
    success: function(server_response){  
	//alert(server_response);
	if(server_response == 1)
	{ 
 window.location = 'show-Demoresult.php?testid='+enctestid;	}  
   
   } 
   
  }); 

return false;
}
