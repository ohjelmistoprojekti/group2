<?php
	session_start();
	header('Content-Type: application/json');
	require_once './answerValidator.php';

	$_SESSION['userId'] = 1;
	
	$answerValidator = new AnswerClass;
	
	$data->userAnswer = $_POST['userAnswer'];
	$data->questionId = $_POST['questionId'];
	

	
	// This is how u use it
	$answerValidator->validateAnswer($data);
	//Simply the best...
?>