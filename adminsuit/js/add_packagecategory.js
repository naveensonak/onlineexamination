		$(document).ready(function () { 
		$("#type").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST", 
			url: "addpackagecategoryNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			alert("Category Added Successfully...");			
            $("#type")[0].reset();
			  $('#excel').modal('hide');
			  window.location ='';
			}
			else if(html==2)
			{ alert("Category Save Successfully...");
			$('#excel').modal('hide');
			  window.location ='';
		
				}
			else if(html==0)
			{ alert("Some Technical Error....");		
				}
			
			}
		});
	
	}));
	
	
	
});

function typedata(id,type) {
               $.ajax({
                   type: "Post",
                  data:"id=" + id + "& type=" + type,
                   url: "getpackagecategorydata.php",
                   success: function (html) { //alert(html);
					$("#material").prop("required", false);  
                   $('#excel').modal('show');
				   document.getElementById('editid').value = id; 
				   document.getElementById('add_item').value = html; 
                       return false;
                   },
                   error: function (e) {
                   }
               });

       }
function rolereset() {
    $('#add_item').val('');
	$('#editid').val('');
} 
