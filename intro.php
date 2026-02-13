<?php

$folder_name = '';
$intro_img = $folder_name . 'intro.mp4';

if (isset($_POST['images'])) {
	$errors = [];
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];
	$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
	$extensions = ['jpeg', 'jpg', 'png', 'gif', 'JPEG', 'JPG', 'PNG', 'GIF', 'mp4', 'MP4'];

	if (in_array($file_ext, $extensions) === false) {
		$errors[] = 'extension not allowed, please choose a JPEG or PNG or GIF or MP4 file.';
	}

	if (11242880 < $file_size) {
		$errors[] = 'File size must not exceed 5 MB';
	}

	if (empty($errors)) {
		if ($_POST['image'] == 'intro') {
			$file_name1 = 'intro.mp4';
		}

		move_uploaded_file($file_tmp, $folder_name . $file_name1);
		header('Location: ' . $_SERVER['PHP_SELF']);
	}
	else {
		print_r($errors);
	}
}

include 'includes/header.php';
echo ' <!-- Begin Page Content -->' . "\n";
echo '        <div class="container-fluid">' . "\n";
echo "\n";
echo '          <!-- Page Heading -->' . "\n";
echo '         ' . "\n";
echo '          <!-- Content Row -->' . "\n";
echo '          <div style="text-align:center;" >' . "\n";
echo "\n";
echo '            <!-- Second Column -->' . "\n";
echo '            <div style="text-align:center;">' . "\n";
echo "\n";
echo '              <!-- Custom codes -->' . "\n";
echo '                <div class="card border-left-primary shadow h-100 card shadow mb-4">' . "\n";
echo '                <div class="card-header py-3">' . "\n";
echo '                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-video"style="color:white;" ></i><i style="color:white;" > Intro Video</h6>' . "\n";
echo '                </div>' . "\n";
echo '                <div class="card-body">' . "\n";
echo "\t\t\t\t\t\t\t" . '<div class="form-group">' . "\n";
echo "\t\t\t\t\t\t" . '<form method="post" enctype="multipart/form-data">';
echo '                            <label style="color:white;" class="control-label " for="intro">' . "\n";
echo '                                <strong> Upload Intro Video File</strong>' . "\n";
echo '                            </label>' . "\n";
echo '<div class="input-group">' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<div class="custom-file">' . "\n";
echo "\t\t\t\t\t\t\t\t\t" . '<input type="file" class="custom-file-input" name="image" id="intro" placeholder="Choose Intro" onchange="uploadintro(this)" aria-describedby="intro">' . "\n";
echo "\t\t\t\t\t\t\t\t\t" . '<label class="custom-file-label" for="intro" placeholder="Choose Intro"><span id="image-intro"></span></label>' . "\n";
echo "\t\t\t\t\t\t\t\t\t" . '<input type="hidden" name="image" value="intro">' . "\n";
echo "\t\t\t\t\t\t\t\t" . '</div>' . "\n";
echo "\t\t\t\t\t\t\t\t" . '<button type="submit" name="images" class="btn btn-primary">Upload</button>' . "\n";
echo "\t\t" . '</div>';
echo '            <!-- Theme -->' . "\n";
echo "\t\t\t" . '</div>' . "\n";
echo '            <div class="wrapper">' . "\n";
echo '            <div class="col-lg">' . "\n";
echo '              <div class="card border-left-primary shadow py-2">' . "\n";
echo '                <div class="card-body">' . "\n";
echo '                  <div class="row no-gutters align-items-center">' . "\n";
echo '                    <div class="col mr-2">' . "\n";
echo '                      <div style="color:white;" >Current Intro</div>' . "\n";
echo '                      <div class="h5 mb-0 font-weight-bold text-gray-800"><video controls="" autoplay="" name="media" width="500"><source src="' . $intro_img . '?' . time() . '" type="video/mp4"></video></div>' . "\n";
echo '        </div>' . "\n";
echo '<br><br>' . "\n";
echo '<br><br>' . "\n";

echo '</body>' . "\n";

?>