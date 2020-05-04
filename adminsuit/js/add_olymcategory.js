		$(document).ready(function () { 
		$("#olympiads").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST", 
			url: "addolymcategoryNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			alert("Olympiads Added Successfully...");			
            $("#olympiads")[0].reset();
			  $('#excel').modal('hide');
			  window.location ='';
			}
			else if(html==2)
			{ alert("Olympiads Save Successfully...");
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
                   url: "getolymcategorydata.php",
                   success: function (html) { //alert(html);
				   var arr = html.split('~');
					$("#material").prop("required", false);  
                   $('#excel').modal('show');
				   document.getElementById('chn').innerHTML = 'Edit Category';
				   document.getElementById('editid').value = id; 
				   document.getElementById('add_item').value = arr[0]; 
				   
                       return false;
                   },
                   error: function (e) {
                   }
               });

       }
function rolereset() {
    $('#add_item').val('');
	$('#sd').val('');
	$('#editid').val('');
	document.getElementById('chn').innerHTML = 'Add Category';
} 
