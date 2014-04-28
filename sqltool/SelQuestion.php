<html>
<body>
<script src="./lib/jQuery.js"></script>
<script language="JavaScript">
$( document ).ready(function() {
	$("#Select").change(function() {
	

		window.location.replace("./syntax.php?Id="+$("#Select").val());
	});
});
</script>


<?php 
	$con = mysqli_connect("10.177.3.206", "miwanski", "doofLLAB2601");
	$db_select = mysqli_select_db($con, "Group2");
	
	$rst = mysqli_query($con, "SELECT DISTINCT `Id` FROM `question`");
	
	echo "<form>";
	echo "<select id='Select' >";
	echo "<option value='0' selected>Select question id</option>";
	while ($row = mysqli_fetch_array($rst)) {
    echo "<option value='" . $row['Id'] . "'>" . $row['Id'] . "</option>";
}
	echo "</select>";
	mysqli_close($con);
	echo "<br>";
	echo "<br>";
	echo "</form>";	
	
	
?>


</body>
</html>