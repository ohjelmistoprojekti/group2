<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Editor</title>
  <script src="./lib/editor/src/ace.js" type="text/javascript" charset="utf-8"></script>
  <script src="./lib/jQuery.js"></script>
  <script>
  $( document ).ready(function() {
	  
		var editor = ace.edit("editor");
		editor.setTheme("ace/theme/twilight");
		editor.session.setMode("ace/mode/sql");

		var dom = require("ace/lib/dom");
	  
		$("#submit").click(function() {

			var myCode = editor.getSession().getValue();
			
			
						$.ajax({
						  type: "POST",
						  url: "../sqltool/lib/ajaxAnswerValidation.php",
						  data: { userAnswer: myCode, questionId: $("#questionId").val() },
						  dataType: 'json'
						})
						  .done(function( msg ) {
							alert(msg);
							
						  }); 
						 
						
		});

	});
  </script>
  
  <style type="text/css" media="screen">

    .ace_editor {
        position: relative !important;
        border: 1px solid lightgray;
        margin: auto;
        height: 200px;
        width: 80%;
    }

    .ace_editor.fullScreen {
        height: auto;
        width: auto;
        border: 0;
        margin: 0;
        position: fixed !important;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
        background: white;
    }

    .fullScreen {
        overflow: hidden
    }

    .scrollmargin {
        height: 500px;
        text-align: center; 
    }
	
	.large-button {
        color: lightblue;
        cursor: pointer;
        font: 30px arial;
        padding: 20px;
        text-align: center;
        border: medium solid transparent;
        display: inline-block;
    }
  </style>
  
</head>
<body>






<pre id="editor"></pre>


<input type="hidden" id="questionId" value="<?php echo $_GET['Id']; ?>" />

<button value="jepjep" id="submit" >Tarkista</button>


</body>
</html>