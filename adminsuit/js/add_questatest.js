$(document).ready(function () {	
	
$("#addquestatestform").on('submit',(function(e) { //alert("");
		e.preventDefault();
var category = $('select#category').val();	
var code = $('input#code').val();		
var title = $('input#title').val();
var price = $('input#price').val();
var duration = $('input#duration').val();
var totalquestion = $('input#totalquestion').val();
var markspercorrectquestion = $('input#markspercorrectquestion').val();
var marksperwrongquestion = $('input#marksperwrongquestion').val();
var maximummarks = $('input#maximummarks').val();
var images = $('input#images').val();
var startdate = $('input#startdate').val();
var enddate = $('input#enddate').val();	
var detail = (CKEDITOR.instances.detail.getData());
var about = (CKEDITOR.instances.about.getData());		
if ((category)== "") {
            $("select#category").focus();
			$('.select2-selection--single').css({'border-color': '#f00'});
            return false;}			
if ((code)== "") {
            $("input#code").focus();
			$('#code').css({'border-color': '#f00'});
            return false;}
						
if ((title)== "") {
            $("input#title").focus();
			$('#title').css({'border-color': '#f00'});
            return false;}
			
if ((price)== "") {
            $("input#price").focus();
			$('#price').css({'border-color': '#f00'});
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


			
	var form_data = new FormData(document.getElementById("addquestatestform"));	
	form_data.append("detail", detail);	
	form_data.append("about", about);	

		$.ajax({
			      
			type: "POST", 
			url: "addquestaTestNow.php",              
			data: form_data, 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#addquestatestform")[0].reset();
			alert("Questa Test Created Successfully !");
			window.location.href = "";
			}			
			else if(html == 2) 
			{alert("Questa Test Updated Successfully !");window.location.href = "manage_questatest.php";}
			else if(html==0)
			{ alert('Some Technical Error !');
				}
			
			}
		});
	
	}));
	
	
	
});

