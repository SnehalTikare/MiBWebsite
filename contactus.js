$(document).ready(function(){
	$('#submit').click(function(){   //formsubmit is button id in html
		$.post("contactus.php",          // this is php to which we sending data.
										 //IMP: This PHP should be in same folder as index.html and not in /js folder
			{name: $('#name').val(),     // IDs in index.html
			 email: $('#email').val(),
			 message: $('#message').val()}, 
			function(data){
				$('#ajax-contact').html(data); //in HTML, div ID qith subscribediv is replaced by whatever is echoed in PHP
			}
		);
});
});