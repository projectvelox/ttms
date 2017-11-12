<?php
$id = $_GET['name'];
$target_dir = "images/players/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $_GET['name'] . "." . $imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        header("Location: player-profile.php?id=".$id);
        $uploadOk = 1;
    } else {
        header("Location: player-profile.php?id=".$id);
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
	$problem = 0;
	$png = "images/players/".$id.".png";
	$jpg = "images/players/".$id.".jpg";
	$jpeg = "images/players/".$id.".jpeg";
	
	if(file_exists($png)){ unlink($png); unlink($jpg); unlink($jpeg);}
	if(file_exists($jpg)){ unlink($jpg); unlink($png); unlink($jpeg);}
	if(file_exists($jpeg)){ unlink($jpeg); unlink($png); unlink($jpg);}
	if(file_exists("images/players/none.jpg")){ copy($_FILES['image']['tmp_name'], $target_file); }

	copy($_FILES['image']['tmp_name'], $target_file);
    header("Location: player-profile.php?id=".$id);
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
     header("Location: player-profile.php?id=".$id);
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
     header("Location: player-profile.php?id=".$id);
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
     header("Location: player-profile.php?id=".$id);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: player-profile.php?id=".$id);
    } else {
        header("Location: player-profile.php?id=".$id);
    }
}
?>