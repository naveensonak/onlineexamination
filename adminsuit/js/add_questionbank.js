$(document).ready(function () {	
	
$("#addquestionbankform").on('submit',(function(e) { //alert("");
		e.preventDefault();
var category = $('select#category').val();
var subcategory = $('select#subcategory').val();			
var seriesno = $('input#seriesno').val();
var title = $('input#title').val();
var price = $('input#price').val();
var pdf = $('input#pdf').val();
var shortdes = $('textarea#shortdes').val();
var detail = (CKEDITOR.instances.detail.getData());
//alert(images);


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
			
			
if ((price)== "") {
            $("input#price").focus();
			$('#price').css({'border-color': '#f00'});
            return false;}
			
if ((shortdes)== "") {
            $("textarea#shortdes").focus();
			$('#shortdes').css({'border-color': '#f00'});
            return false;}						
			
		var form_data = new FormData(document.getElementById("addquestionbankform"));	
	form_data.append("detail", detail);	


		$.ajax({
			      
			type: "POST", 
			url: "addquestionbankNow.php",              
			data: form_data, 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#addquestionbankform")[0].reset();
			alert("Question Bank Created Successfully !");
			window.location.href = "";
			}			
			else if(html == 2) 
			{alert("Question Bank  Updated Successfully !");
			window.location.href = "manage_questionBank.php";}
			else if(html==0)
			{ alert('Some Technical Error !');
				}
			
			}
		});
	
	}));
	
	
	
});

