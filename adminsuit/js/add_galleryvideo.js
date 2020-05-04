		$(document).ready(function () { 
		$("#type").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST", 
			url: "addgalleryvideoNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
// 			console.log(html);
			if (html == 1) {
			alert("Video Added Successfully...");			
            $("#type")[0].reset();
			  $('#excel').modal('hide');
			  window.location ='';
			}
			else if(html==2)
			{ alert("Video Save Successfully...");
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
                   url: "getvideogallerydata.php",
                   success: function (html) { //alert(html);
					$("#material").prop("required", false);  
                   $('#excel').modal('show');
			var arr = html.split('~');

				   document.getElementById('editid').value = id; 
				   document.getElementById('add_item').value = arr[0]; 
				   document.getElementById('video').value = arr[1]; 
                       return false;
                   },
                   error: function (e) {
                   }
               });

       }
function rolereset() {
    $('#add_item').val('');
	 $('#video').val('');
	$('#editid').val('');
} 
