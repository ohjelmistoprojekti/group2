<?php
	session_start();
	require_once './answerValidator.php';
	
	
	
	
	//Requires following data:
	// json encoded data, that has 
	//		"userAnswer" (has the user given input)
	//		"questionId" (has the question id)
	// session data, that has
	//		"userId" (the member user id)
	$_SESSION['userId'] = 1;
	
	$answerValidator = new AnswerClass;
	
	$data = array("userAnswer" => "SELECT * FROM Customer WHERE 1 = 1;", "questionId" => 1);
	$json = json_encode($data);
	
	
	// This is how u use it
	$answerValidator->validateAnswer($json);
	//Simply the best...
?>