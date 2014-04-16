<?php

	/***********************************************/
	/*			Validates the user given			/
	/*		SQL- query, compares it to model		/
	/*	answer, saves the data and gives feedback 	/
	/*					in JSON						/
	/***********************************************/
				/* By: Jarmo Alakotila	*/
	
	require_once './answerValidator.php';
	
	$answerValidator = new AnswerClass;
	$action = $_GET['action'];
	
	
	switch($action)
	{
		case 'validate':
			$userdata = $_GET['answer'];
			$

			$answerValidator->validateAnswer($userdata,);
			
			break;
		default:
			trigger_error("No such action", E_USER_ERROR);
			break;
	}	

	


?>