<?php
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// 

// Check if file already exists


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "zip" && $imageFileType != "zip" && $imageFileType != "zip"
&& $imageFileType != "zip" ) {
  echo "Sorry, only zip files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    
        echo "			<strong><h5><li><a> Your zip located on http://yourpanelurl/files/(zip file name).zip </a></li>          </strong></h5>\n";

    
echo "			<strong><h5><li><a href=\"vpn.php\" > Back to Panel</a></li>          </strong></h5>\n";


    
    ;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>