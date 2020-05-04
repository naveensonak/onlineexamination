		$(document).ready(function () { 
		$("#type").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST", 
			url: "addbannerNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			alert("Banner Added Successfully...");			
            $("#type")[0].reset();
			  $('#excel').modal('hide');
			  window.location ='';
			}
			else if(html==2)
			{ alert("Banner Save Successfully...");
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
                   url: "getbannerdata.php",
                   success: function (html) { //alert(html);
				   var arr = html.split('~');
					$("#material").prop("required", false);  
                   $('#excel').modal('show');
				   document.getElementById('chn').innerHTML = 'Edit Banner';
				   document.getElementById('editid').value = id; 
				   document.getElementById('add_item').value = arr[0]; 
				   document.getElementById('sd').value = arr[1];
				   document.getElementById('link').value = arr[2]; 
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
	document.getElementById('chn').innerHTML = 'Add Banner';
} 
