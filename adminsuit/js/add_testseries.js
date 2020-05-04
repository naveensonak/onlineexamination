$(document).ready(function () {	
	
$("#addtestseriesform").on('submit',(function(e) { //alert("");
		e.preventDefault();
var category = $('select#category').val();
var subcategory = $('select#subcategory').val();			
var seriesno = $('input#seriesno').val();
var title = $('input#title').val();
var type = $('select#type').val();
var test = $('input#test').val();
var price = $('input#price').val();
var images = $('input#images').val();
var detail = (CKEDITOR.instances.detail.getData());
var faq = (CKEDITOR.instances.faq.getData());
var topic = $('textarea#topic').val();
//alert(images);
if ((category)== "") {
            $("select#category").focus();
			$('#category').css({'border-color': '#f00'});
            return false;}

if ((subcategory)== "") {
            $("select#subcategory").focus();
			$('#subcategory').css({'border-color': '#f00'});
            return false;}
			
			
if ((seriesno)== "") {
            $("input#seriesno").focus();
			$('#seriesno').css({'border-color': '#f00'});
            return false;}
			
if ((title)== "") {
            $("input#title").focus();
			$('#title').css({'border-color': '#f00'});
            return false;}
			
if ((type)== "") {
            $("select#type").focus();
			$('#type').css({'border-color': '#f00'});
            return false;}
if ((test)== "") {
            $("input#test").focus();
			$('#test').css({'border-color': '#f00'});
            return false;}
			
if ((price)== "") {
            $("input#price").focus();
			$('#price').css({'border-color': '#f00'});
            return false;}
			
if ((images)== "") {
            $("input#images").focus();
			$('#images').css({'border-color': '#f00'});
            return false;}			
			
			
		var form_data = new FormData(document.getElementById("addtestseriesform"));	
	form_data.append("detail", detail);	
	form_data.append("faq", faq);						


		$.ajax({
			      
			type: "POST", 
			url: "addtestseriesNow.php",              
			data: form_data, 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#addtestseriesform")[0].reset();
			alert("Test Series Created Successfully !");
			window.location.href = "";
			}			
			else if(html == 2) 
			{alert("Test Series Updated Successfully !");window.location.href = "manage_testseries.php";}
			else if(html==0)
			{ alert('Some Technical Error !');
				}
			
			}
		});
	
	}));
	
	
	
});

