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
var orderid = $('input#orderid').val();
var enctestid = $('input#enctestid').val();
// var orderid = $('input#orderid').val();
var numberOfCheckedRadio = $('input:radio:checked').length;
// alert(numberOfCheckedRadio);
var radios = [];
$.each($('input[type="radio"]:checked'), function() {
radios.push($(this).val());
});
var radio=radios.join('~');
//alert(radio);
$('#quize_submit').attr('disabled','disabled');
$.ajax({  
    type: "POST",  
    url: "submitolymquizeNow.php",  
     data: "userid="+ userid+ "& testid=" + testid+ "& orderid=" + orderid + "& numberOfCheckedRadio=" + numberOfCheckedRadio+ "& radio=" + radio,  
    //    data: {userid:userid,testid:testid,orderid:orderid,enctestid:enctestid,numberOfCheckedRadio:checked},
    success: function(server_response){  
	//alert(server_response);
	if(server_response == 1)
	{ 
 window.location = 'show-olympiads-result.php?testid='+enctestid;	}  
   
   } 
   
  }); 

return false;
}
