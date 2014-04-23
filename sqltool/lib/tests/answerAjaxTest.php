<?php

	//In this file you can find out how to use the jQuery AJAX to validate the answer.
	//Try with "SELECT * FROM Customer WHERE 1 = 1;" and with something that does not 

?>

<html>
	<head>
		<title>Ajax Tester</title>
		<script src="../jQuery.js"></script>
		<script>
		$( document ).ready(function() {
		 
			$("#submit").click(function() {
			
				$.ajax({
				  type: "POST",
				  url: "../ajaxAnswerValidation.php",
				  data: { userAnswer: $("#userAnswer").val(), questionId: $("#questionId").val() },
				  dataType: 'json'
				})
				  .done(function( msg ) {
					var response = msg;
					
				  });
				
				
			});
		 
		});
		
		</script>
	</head>
	
	<body>
		<form method="POST">
			User input query:<input type="text" id="userAnswer" /><br />
			<input type="hidden" id="questionId" value="1" />
			
		</form>
		<button id="submit" name="Submit" value="jepjep" >Paina</button>
	</body>
</html>