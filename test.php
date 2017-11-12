<!DOCTYPE html>
<html>
<body>
<?php 
	$id = Jude;
	$problem = 0;
	$png = "images/players/".$id.".png";
	$jpg = "images/players/".$id.".jpg";
	$jpeg = "images/players/".$id.".jpeg";
	if(file_exists($png)){ $problem=1; echo "<img src='".$png."' style='height: 100%;'></br></br>"; }
	if(file_exists($jpg)){ $problem=1; echo "<img src='".$jpg."' style='height: 100%;'></br></br>"; }
	if(file_exists($jpeg)){ $problem=1; echo "<img src='".$jpeg."' style='height: 100%;'></br></br>"; }
	
	if($problem == 0){
		echo "<img src='images/players/none.jpg' style='height: 100%;'></br></br>";
	}							
?>

<form action="upload.php?name=Jude" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>