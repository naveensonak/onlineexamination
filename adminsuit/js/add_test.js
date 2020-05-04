$(document).ready(function () {	
	
$("#addtestform").on('submit',(function(e) { //alert("");
		e.preventDefault();
var series = $('select#series').val();
var code = $('input#code').val();
var totalquestion = $('input#totalquestion').val();
var markspercorrectquestion = $('input#markspercorrectquestion').val();
var marksperwrongquestion = $('input#marksperwrongquestion').val();
var maximummarks = $('input#maximummarks').val();
var duration = $('input#duration').val();
var type = $('select#type').val();
var topic = $('input#topic').val();
var detail = (CKEDITOR.instances.detail.getData());
//alert(images);
if ((series)== "") {
            $("select#series").focus();
			$('.select2-selection--single').css({'border-color': '#f00'});
            return false;}

if ((code)== "") {
            $("input#code").focus();
			$('#code').css({'border-color': '#f00'});
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
			
if ((duration)== "") {
            $("input#duration").focus();
			$('#duration').css({'border-color': '#f00'});
            return false;}			
if ((type)== "") {
            $("select#type").focus();
			$('#type').css({'border-color': '#f00'});
            return false;}
						
if ((topic)== "") {
            $("input#topic").focus();
			$('#topic').css({'border-color': '#f00'});
            return false;}	
					
		var form_data = new FormData(document.getElementById("addtestform"));	
	form_data.append("detail", detail);	


		$.ajax({
			      
			type: "POST", 
			url: "addtestNow.php",              
			data: form_data, 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#addtestform")[0].reset();
			alert("Test Created Successfully !");
			window.location.href = "";
			}			
			else if(html == 2) 
			{alert("Test Updated Successfully !");window.location.href = "manage_test.php";}
			else if(html==0)
			{ alert('Some Technical Error !');
				}
			
			}
		});
	
	}));
	
	
	
});

