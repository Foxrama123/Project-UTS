<?php
	if(isset($_POST['save'])){
		$arr_all = isset($_COOKIE['arr_all']) ? unserialize($_COOKIE['arr_all']) : array();
		$hitung=0;
		if (sizeof($arr_all)==0) {
			$arr_theme = array(       	
    			'name' => $_POST['name'],
        		'background' => $_POST['background'],
        		'colorHeading' => $_POST['colorHeading'],
        		'alignHeading' => $_POST['alignHeading'],
        		'colorParagraph' => $_POST['colorParagraph'],
        		'size' => $_POST['size']
    		);
    		$arr_all[] = $arr_theme;
			$arr_all_serialize = serialize($arr_all);
			setcookie("arr_all", $arr_all_serialize, time()+6000);
		}
		else{
			for ($i=0; $i < sizeof($arr_all); $i++) { 
    			if ($_POST['name']==$arr_all[$i]["name"]) {
    				$hitung+=1;
    			}
    		}
    		if ($hitung==0) {
    			$arr_theme = array(       	
    				'name' => $_POST['name'],
        			'background' => $_POST['background'],
        			'colorHeading' => $_POST['colorHeading'],
        			'alignHeading' => $_POST['alignHeading'],
        			'colorParagraph' => $_POST['colorParagraph'],
        			'size' => $_POST['size']
    				);
    				$arr_all[] = $arr_theme;
					$arr_all_serialize = serialize($arr_all);
					setcookie("arr_all", $arr_all_serialize, time()+6000);
    		}
    		else{
    			echo "<script>alert('Name already exists. Please use a different name.')</script>";
    		} 
    	}
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add</title>
</head>
<body>
<form action="add.php" method="POST">
	<label for="name">Name of your theme : </label><input id="name" type="text" name="name" required><br><br>
	<label for="background">Color of Page Background : </label><input id="background" type="color" name="background" required><br><br>
	<label for="colorHeading">Color of Heading 1 : </label><input id="colorHeading" type="color" name="colorHeading"><br><br>
	<label for="alignHeading">Alignment of Heading 1 : </label><select id="alignHeading" name="alignHeading" required>
			<option value="">-- Choose the Alignment --</option>
			<option value="Left">Left</option>
			<option value="Right">Right</option>
			<option value="Center">Center</option>
			<option value="Justify">Justify</option> 
	</select><br><br>
	<label for="colorParagraph">Color of Paragraph : </label><input id="colorParagraph" type="color" name="colorParagraph" required><br><br>
	<label for="size">Font size of Paragraph : </label><input id="size" type="number" name="size" min="10" max="24" required>px<br><br>
	<input type="submit" name="save" value="Save">
</form>
</body>
</html>