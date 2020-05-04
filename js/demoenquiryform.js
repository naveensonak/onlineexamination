$(document).ready(function () {
    $("#quize_demoformsubmit").click(function () {
		submit_demoform();
    });
	
	
    // --------------------------------   login page function end -----------------------------
});

function submit_demoform(){	
var ename = $('input#ename').val();
var eemailid = $('input#eemailid').val();
var econtact = $('input#econtact').val();

if ((ename)== "") {
            $("input#ename").focus();
			$('#ename').css({'border-color': '#f00'});
            return false;}

if ((eemailid)== "") {
            $("input#eemailid").focus();
			$('#eemailid').css({'border-color': '#f00'});
            return false;}
			
if ((econtact)== "") {
            $("input#econtact").focus();
			$('#econtact').css({'border-color': '#f00'});
            return false;}
		
		
		$.ajax({
			type: "POST", 
			url: "adddemoEnqueryNow.php",              
            data: "ename="+ ename+ "& eemailid=" + eemailid + "& econtact=" + econtact,  
			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			alert("Thank You for your interest !");			
			  document.getElementById('close').click();
			  window.location = 'show-home-demoResult.php';
			}
			else if(html==2)
			{ alert("Banner Save Successfully...");
			$('#userdetail').modal('hide');
			  window.location ='';
		
				}
			else if(html==0)
			{ alert("Some Technical Error....");		
				}
			
			}
		});
	
}