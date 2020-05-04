		$(document).ready(function () { 
		$("#type").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST", 
			url: "addsubcategoryNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			alert("Sub Category Added Successfully...");			
            $("#type")[0].reset();
			  $('#excel').modal('hide');
			  window.location ='';
			}
			else if(html==2)
			{ alert("Sub Category Save Successfully...");
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
                   url: "getsubcategorydata.php",
                   success: function (html) { //alert(html);
				   var arr = html.split('~');
					$("#material").prop("required", false);  
                   $('#excel').modal('show');
				   
		$("#type option").each(function(){
        if($(this).val()==arr[0]){
            $(this).attr("selected","selected");    
        }
    });
	document.getElementById('editid').value = id; 
	document.getElementById('add_item').value = arr[1]; 
                       return false;
                   },
                   error: function (e) {
                   }
               });

       }
function rolereset() {
    $('#add_item').val('');
	$('#editid').val('');
	$('#type').val('');
} 
