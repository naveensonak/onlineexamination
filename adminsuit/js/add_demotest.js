$(document).ready(function () {	
	
$("#adddemotestform").on('submit',(function(e) { //alert("");
		e.preventDefault();
var title = $('input#title').val();
var duration = $('input#duration').val();
var totalquestion = $('input#totalquestion').val();
var markspercorrectquestion = $('input#markspercorrectquestion').val();
var marksperwrongquestion = $('input#marksperwrongquestion').val();
var maximummarks = $('input#maximummarks').val();
var images = $('input#images').val();
			
			
			
if ((title)== "") {
            $("input#title").focus();
			$('#title').css({'border-color': '#f00'});
            return false;}
			
if ((duration)== "") {
            $("input#duration").focus();
			$('#duration').css({'border-color': '#f00'});
            return false;}
if ((totalquestion)== "") {
            $("input#totalquestion").focus();
			$('#totalquestion').css({'border-color': '#f00'});
            return false;}
			
if ((markspercorrectquestion)== "") {
            $("input#markspercorrectquestion").focus();
			$('#markspercorrectquestion').css({'border-color': '#f00'});
            return false;}
			
if ((marksperwrongquestion)== "") {
            $("input#marksperwrongquestion").focus();
			$('#marksperwrongquestion').css({'border-color': '#f00'});
            return false;}
			
if ((maximummarks)== "") {
            $("input#maximummarks").focus();
			$('#maximummarks').css({'border-color': '#f00'});
            return false;}

			
			

		$.ajax({
			      
			type: "POST", 
			url: "adddemoTestNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#adddemotestform")[0].reset();
			alert("Demo Test Created Successfully !");
			window.location.href = "";
			}			
			else if(html == 2) 
			{alert("Demo Test Updated Successfully !");window.location.href = "manage_demoTest.php";}
			else if(html==0)
			{ alert('Some Technical Error !');
				}
			
			}
		});
	
	}));
	
	
	
});

