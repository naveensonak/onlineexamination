$(document).ready(function () { 
$("#myprofiles").on('submit',(function(e) { 
		e.preventDefault();
var name = $('input#name').val();
var mobile = $('input#mobile').val();
var amobile = $('input#amobile').val();
var dob = $('input#dob').val();
var myclass = $('input#myclass').val();
var school = $('input#school').val();
var address = $('input#address').val();
if((name) =="") {
            $("input#name").focus();
			$('#name').css({'border-color': '#f00'});
            return false;}
if((mobile) =="") {
            $("input#mobile").focus();
			$('#mobile').css({'border-color': '#f00'});
            return false;}
if((dob) =="") {
            $("input#dob").focus();
			$('#dob').css({'border-color': '#f00'});
            return false;}

if ((myclass)== "") {
            $("input#myclass").focus();
			$('#myclass').css({'border-color': '#f00'});
            return false;}

if ((school)== "") {
            $("input#school").focus();
			$('#school').css({'border-color': '#f00'});
            return false;}
			
if ((address)== "") {
            $("input#address").focus();
			$('#address').css({'border-color': '#f00'});
            return false;}

		$.ajax({
			      
			type: "POST", 
			url: "myprofileNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
		document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#090;">Profile Updated Successfully..</font>');
			$('#sucess').delay(3000).fadeOut('slow');
            window.location = '';

			}			
			else if(html==2)
			{ document.getElementById('exist').innerHTML = ('<font size="1" style="color:#f00;">Email Id Allready Register With Us!</font>');
				}
			else if(html==0)
			{ document.getElementById('sucess').innerHTML = ('<font size="2" style="color:#f00;">Oops..Some Technical Error..</font>');
				}
			
			}
		});
	
	}));
	
	
	
});

