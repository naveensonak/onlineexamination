$(document).ready(function () {	
	
$("#addquestionform").on('submit',(function(e) {
		e.preventDefault();
var testid = $('input#testid').val();
var answer = $('input#answer').val();
var convertedtestid = $('input#convertedtestid').val();
var question = (CKEDITOR.instances.question.getData());
var opt1 = (CKEDITOR.instances.opt1.getData());
var opt2 = (CKEDITOR.instances.opt2.getData());
var opt3 = (CKEDITOR.instances.opt3.getData());
var opt4 = (CKEDITOR.instances.opt4.getData());
if ((answer)== "") {
            alert("Please Select an Answer !");
            return false;}

	var form_data = new FormData(document.getElementById("addquestionform"));	
	form_data.append("question", question);	
	form_data.append("opt1", opt1);
	form_data.append("opt2", opt2);	
	form_data.append("opt3", opt3);	
	form_data.append("opt4", opt4);							

		$.ajax({
			type: "POST", 
			url: "addquestaquestionNow.php",              
			data: form_data, 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			$("#addquestionform")[0].reset();
			alert("Question Added Successfully !");
			window.location.href = "";
			}			
			else if(html == 2) 
			{alert("Question Updated Successfully !");
			window.location.href = "manage_questaquestionDetail.php?id="+convertedtestid;}
			else if(html==0)
			{ alert('Some Technical Error !');
				}
			
			}
		});
	
	}));
	
	
	
});

