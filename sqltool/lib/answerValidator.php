<?php

	/***********************************************/
	/*												/
	/*		  Class for answer validating			/
	/*												/
	/***********************************************/
				/* By: Jarmo Alakotila	*/
				
				
	
	class AnswerClass
	{
		//Initialize Class variables
		
		//Connection Variables
		private $mysqlConnection = null;
		private $testing = false;
		
		private $error = "";
		
		private $testDataBaseConnection = null;
		
		//	Creator: 		Jarmo Alakotila
		//	Name:			mysql_connection()
		//	Requires:		-
		//	Modifications:	Initial Commit 140414 Jalakotila
		private function mysql_connection()
		{
			$this->mysqlConnection = mysqli_connect('localhost', 'jalakotila', 'PjevF7J2', 'Group2');
			
			//Test the connection
			if (mysqli_connect_errno()) 
			{
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}	
		}
		
		
		private function openTestDataBaseConnection($credentials)
		{

			$this->testDataBaseConnection = mysqli_connect($credentials['Address'], $credentials['Uname'], $credentials['Pwd'], $credentials['Database']);
			

			
			//Test the connection
			if (mysqli_connect_errno()) 
			{
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}

		}
		
		//	Creator: 		Jarmo Alakotila
		//	Name:			validateAnswer()
		//	Requires:		$json = JSON- encoded data, that has 
		//					1) UserId
		//					2) Answer from user 
		//					3) QuestionId
		//	Modifications:	Initial Commit 090414 Jalakotila

		public function validateAnswer($data)
		{
			
		
			//Check the MySQL & MSSQL Connection
			//If no connection, connect
			
			//MySQL
			if ($this->mysqlConnection == null)
				$this->mysql_connection();
			else
			{
				echo "Database Connection Failed";
				exit(0);
			}	
				
			//////////////////////////////
			//	Get the question data	//
			//////////////////////////////
			$question;
			
			$questionDataQuery = "SELECT * FROM question WHERE Id = ".$data->questionId.";";
			
			if ($query = $this->mysqlConnection->query($questionDataQuery))
			{
				$question = $query->fetch_array(MYSQLI_ASSOC);
				
				if($question == null)
				{
					echo "No question with that id";
					exit(0);
				}
			}
			else
			{
				echo "Could not fetch question data";
				exit(0);
			}
			
			$isDelete = false;
			//Check if the query is "delete" type (For further use)
			if(strpos(strtolower($question['Model_answer']), "delete"))
			{
				$isDelete = true;
			}
			
			
			
			//Get the test database connection credentials
			$question['Database'] = mysql_real_escape_string($question['Database']);
			$testDbData = "SELECT * FROM database_info WHERE Id = ".$question['Database']."";
			
			if($testDb = $this->mysqlConnection->query($testDbData))
				$testDbResult = $testDb->fetch_array(MYSQLI_ASSOC);
			else
			{
				echo "Could not fetch test Database data";
				exit(0);
			}
			
			//Test Database Connection
			try
			{
				$this->openTestDataBaseConnection($testDbResult);
			}
			catch(Exception $ex)
			{
				echo $ex;
				exit(0);
			}
			
			
			
			//////////////////////////////
			//	Compare the user query 	//
			//	  with teacher query	//
			//////////////////////////////
			
			//User Query
			
			$userTemp = array();
			$modelTemp = array();

		
			if($userQuery = $this->testDataBaseConnection->query($data->userAnswer))
			{
				while($row = $userQuery->fetch_array(MYSQLI_ASSOC))
				{
					array_push($userTemp, $row);
				}
			}
			else
			{
				$error .= $this->testDataBaseConnection->error." ";
			}

			
						
			
			//Model Answer Query
			$modelQuery = $this->testDataBaseConnection->query($question['Model_answer']);
			
			if($modelQuery = $this->testDataBaseConnection->query($question['Model_answer']))
			{
				while($row = $modelQuery->fetch_array(MYSQLI_ASSOC))
				{
					array_push($modelTemp, $row);
				}
			}
			else
			{
				$error .= $this->testDataBaseConnection->error." ";
			}
			
			
			
			
			//////////////////////////////
			//	Compare the results		//
			//////////////////////////////
			
			$match = false;
			
			if($userTemp == $modelTemp)
			{
				$match = true;
			}

			
			
			//////////////////////////////
			//	Save the Result to db	//
			//////////////////////////////
			
			$answerdata['userId'] = $_SESSION['userId'];
			$answerdata['questionId'] = $question['Id'];
			$answerdata['input'] = $this->testDataBaseConnection->real_escape_string($data->userAnswer);
			$answerdata['response'] = $error;
			
			if($match == true)
				$answerdata['state'] = 1;
			else
				$answerdata['state'] = 2;
			
			$insertQuery = "INSERT INTO answers VALUES ('', '".$answerdata['userId']."', 
															'".$answerdata['questionId']."', 
															'".$answerdata['input']."',
															'".$answerdata['response']."',
															'".$answerdata['state']."');";
			

			
			$this->mysqlConnection->query($insertQuery);
			
			
			
			
			//		Testing purposes	//
			if($this->testing == true)
			{
				echo "<h1>Question</h1><pre>";
				print_r($question);
				echo "</pre>";
				
				echo "<h1>TestDb Connection</h1><pre>";
				print_r($this->testDataBaseConnection);
				echo "</pre>";
				
				echo "<h1>MySQL Connection</h1><pre>";
				print_r($this->mysqlConnection);
				echo "</pre>";
			}
			
			$this->mysqlConnection->close();
			$this->testDataBaseConnection->close();
			
			echo json_encode($answerdata);
			
		}
		
	}
	
?>