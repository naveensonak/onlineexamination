$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
		
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){ alert("Right click is disabled !");
        return false;
    });
});
$(document).ready(function () { 
		$(".pay").on('submit',(function(e) {
		e.preventDefault();
var test_id = $('input#test_id').val();
var type = $('input#type').val();

//alert(test_id);
		$.ajax({
			type: "POST", 
			url: "payNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			if (html == 1) {
			alert("Order Received Successfully...");
			//$('#success').modal('show');
			if(type=='series'){				
            window.location='series-details.php?seriesid='+test_id;}
			else{window.location='question-bank-details.php?qbankid='+test_id;}
			}else if(html==0)
			{ alert("Form Not Submitted..Due To Some Technical Problems.....");		
				}
			
			}
		});
	
	}));
	
	
	
});

