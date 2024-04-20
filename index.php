<?php
	//clear cookie
	//setcookie("arr_all","",time()-1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<style type="text/css">
    <?php
		if(isset($_COOKIE['arr_all'])){
			if(isset($_POST['choose'])){
    			$arr_all = unserialize($_COOKIE['arr_all']);
    			for ($i=0; $i < sizeof($arr_all); $i++) { 
    				if($arr_all[$i]["name"]==$_POST['selTheme']){
    					echo "h1 {text-align: ".$arr_all[$i]["alignHeading"]."; color: ".$arr_all[$i]["colorHeading"].";} ";
    					echo "p {color: ".$arr_all[$i]["colorParagraph"]."; font-size: ".$arr_all[$i]["size"]."px;} ";
    					echo "form {color: ".$arr_all[$i]["colorParagraph"]."; font-size: ".$arr_all[$i]["size"]."px;} ";
    					echo "body {background-color: ".$arr_all[$i]["background"].";} ";
    				}
				}
			}	 
		}
    ?>
	</style>
</head>
<body>
	<form method="POST">
	<label for="selTheme">Theme : </label><select id="selTheme" name="selTheme" required>
		<option value="">-- Choose Theme --</option>
	<?php
		if(isset($_COOKIE['arr_all'])) {
			$arr_all = unserialize($_COOKIE['arr_all']);
			for ($i=0; $i < sizeof($arr_all); $i++) { 
				echo "<option value=\"".$arr_all[$i]["name"]."\">".$arr_all[$i]["name"]."</option>";
			}
		}
	?>
	</select> &nbsp;
	<a href="add.php">Add New Theme</a><br><br>
	<button type="submit" name="choose" formaction="home.php">Choose the Theme</button>
	<button type="submit" name="edit" formaction="edit.php">Edit the Theme</button>
</form><br><hr>
<h1>Heading 1</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<?php
	if(isset($_COOKIE['arr_all'])) {  
		print_r($arr_all);
	}
	if(isset($_POST['selTheme'])){
		echo $_POST['selTheme'];
	}
?>
</body>
</html>
