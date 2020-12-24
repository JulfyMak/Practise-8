<?php
$target_dir = "public/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$msg = "Photo has been changed!";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    	$uploadOk = 1;
	} else {
        $msg = "File is not an image.";
    	$uploadOk = 0;
	}
}
$file_name = basename( $_FILES["fileToUpload"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
	$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $msg = "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is not set to 0 by an error
if ($uploadOk != 0) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $msg = "The file ".$file_name." has been uploaded.";
	} else {
    $msg = "Sorry, there was an error uploading your file.";
	}
}

require_once "pages/connection.php";
$sql = "UPDATE users SET photo='$file_name' WHERE id=".$_GET['id'];
$res = mysqli_query($conn, $sql);

if (!$res) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Success</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
				<h4 class="my-0 mr-md-auto font-weight-normal">Photo</h4>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php
              session_start();
              if($_SESSION['auth']=='true' && $_SESSION['admin']=='true'){
                $url = "./pages/restricted_admin.php?id=".$_SESSION['admin_id'];
              } elseif($_SESSION['auth']=='true' ){
                $url = "./pages/restricted.php?id=".$_SESSION['id'];
              } else {
                $url = "/";
              }
            ?>
            <a class="btn btn-outline-success btn-lg" href="<?php echo $url; ?>">Back</a>
        </nav>
    </div>

  </header>
  <div class="container">
    <h3><?php echo $msg ?></h3>
  </div>
</body>
