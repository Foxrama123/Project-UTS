<?php
	if(isset($_POST['save'])){
    	$arr_all = unserialize($_COOKIE['arr_all']);
    	$hitung=0;
    	$index=0;
    	for ($i=0; $i < sizeof($arr_all); $i++) {
    		if($_POST['name']!=$_POST['selTheme']){
    			if ($_POST['name']==$arr_all[$i]["name"]) {
    				$hitung+=1;
    				$index=$i;
    			}
    		}
    		else{
    			if ($_POST['name']==$arr_all[$i]["name"]) {
    			    $arr_all[$i]["name"] = $_POST['name'];
    				$arr_all[$i]["background"] = $_POST['background'];
    				$arr_all[$i]["colorHeading"] = $_POST['colorHeading'];
    				$arr_all[$i]["alignHeading"] = $_POST['alignHeading'];
    				$arr_all[$i]["colorParagraph"] = $_POST['colorParagraph'];
    				$arr_all[$i]["size"] = $_POST['size'];
					$arr_all_serialize = serialize($arr_all);
					setcookie("arr_all", $arr_all_serialize, time()+6000);
					header("location: home.php");
    			}
    		}
    	}	
    	if ($hitung==0) {
    		$arr_all[$index]["name"] = $_POST['name'];
    		$arr_all[$index]["background"] = $_POST['background'];
    		$arr_all[$index]["colorHeading"] = $_POST['colorHeading'];
    		$arr_all[$index]["alignHeading"] = $_POST['alignHeading'];
    		$arr_all[$index]["colorParagraph"] = $_POST['colorParagraph'];
    		$arr_all[$index]["size"] = $_POST['size'];
			$arr_all_serialize = serialize($arr_all);
			setcookie("arr_all", $arr_all_serialize, time()+6000);
			header("location: home.php");
    	}
    	else{
    		echo "<script>alert('Name already exists. Please use a different name.')</script>";
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
<form action="edit.php" method="POST">
	<?php
    	$arr_all = unserialize($_COOKIE['arr_all']);
    	for ($i=0; $i < sizeof($arr_all); $i++) { 
    		if($arr_all[$i]["name"]==$_POST['selTheme']){
    				$index=$i;
    			echo '<label for="name">Name of your theme : </label><input id="name" type="text" name="name" value="'.$arr_all[$i]["name"].'" required><br><br>';
    			echo '<label for="background">Color of Page Background : </label><input id="background" type="color" name="background" value="'.$arr_all[$i]["background"].'" required><br><br>';
    			echo '<label for="colorHeading">Color of Heading 1 : </label><input id="colorHeading" type="color" name="colorHeading" value="'.$arr_all[$i]["colorHeading"].'"><br><br>';
    			echo '<label for="alignHeading">Alignment of Heading 1 : </label><select id="alignHeading" name="alignHeading" required>
					<option value="">-- Choose the Alignment --</option>
					<option value="Left"';
				if($arr_all[$i]["alignHeading"]=="Left"){
					echo ' selected';
				}
				echo '>Left</option>
					<option value="Right"';
				if($arr_all[$i]["alignHeading"]=="Right"){
					echo ' selected';
				}
				echo '>Right</option>
					<option value="Center"';
				if($arr_all[$i]["alignHeading"]=="Center"){
					echo ' selected';
				}
				echo '>Center</option>
					<option value="Justify"';
				if($arr_all[$i]["alignHeading"]=="Justify"){
					echo ' selected';
				}
				echo '>Justify</option> 
					</select><br><br>';
    			echo '<label for="colorParagraph">Color of Paragraph : </label><input id="colorParagraph" type="color" name="colorParagraph" value="'.$arr_all[$i]["colorParagraph"].'" required><br><br>';
    			echo '<label for="size">Font size of Paragraph : </label><input id="size" type="number" name="size" value="'.$arr_all[$i]["size"].'" min="10" max="24" required>px<br><br>';
    			echo '<input type="hidden" name="selTheme" value="' .$_POST['selTheme']. '">';
    		}
		}
	?>
	<input type="submit" name="save" value="Save">
</form>
</body>
</html>