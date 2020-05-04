		$(document).ready(function () { 
		$("#timeslot").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST", 
			url: "addolymtesttimeslotNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			alert("Time Slot Added Successfully...");			
            $("#iphoneprice")[0].reset();
			  $('#excel').modal('hide');
			  window.location ='';
			}
			else if(html==2)
			{ alert("Time Slot Save Successfully...");
			$('#excel').modal('hide');
			  window.location ='';
		
				}
		else if(html==3)
			{ alert("Combination allready exist...");
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
                   url: "getolymtimeslotdata.php",
                   success: function (html) { //alert(html);
				   var arr = html.split('~');
				   $('#excel').modal({backdrop: 'static', keyboard: false})  
  			$('#excel').modal('show');  
                   $('#excel').modal('show');
			   //alert(arr[3]);
	document.getElementById('startdate').value = arr[0];		   
	document.getElementById('enddate').value = arr[1];			   
	document.getElementById('limit').value = arr[2];	
	document.getElementById('editid').value = id; 
	 
                       return false;
                   },
                   error: function (e) {
                   }
               });

       }
function rolereset() {
    $('#startdate').val('');
	$('#enddate').val('');
	$('#limit').val('');
	$('#editid').val('');
} 
