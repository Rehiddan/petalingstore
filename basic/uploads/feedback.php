<?php 
include ("../login/session.php");
include('../db.php');

session_start();
  
if (!isset($_SESSION['email'])) {
          
  // Check if the "remember_user" cookie is set
  if (isset($_COOKIE['remember_user'])) {
    // TODO: Authenticate the user using the cookie value
    // ...

    header('Location: ../login');
} 

} 
		
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Petaling Smash Store</title>
  <meta charset="UTF-8"> 
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> 

  <!-- =======================================================
  * Template Name: Ninestars
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>
<body>

 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">

        <a href="../index.php"><img src="../../images/logo2.png" alt="Logo" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../product.php">Product</a></li>
          <li><a class="nav-link scrollto" href="../view_order.php">History Order</a></li>
          <li><a class="nav-link scrollto" href="../view_profile.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="../feedback.php">Feedback</a></li>
          <li><a class="getstarted scrollto" href="../login/logout.php">Sign Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <br><br><br>

<h1>Image Uploads For Bug Reporting</h1>

<form method="post" enctype="multipart/form-data" action="feedback.php">

    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->

    <label for="image">Image file</label>
    <input type="file" id="image" name="image">


    <button>Upload</button>

</form>

</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('');
}

if (empty($_FILES)) {
    exit('$_FILES is empty - is file_uploads set to "Off" in php.ini?');
}

if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {

    switch ($_FILES["image"]["error"]) {
        case UPLOAD_ERR_PARTIAL:
            exit('File only partially uploaded');
            break;
        case UPLOAD_ERR_NO_FILE:
            exit('No file was uploaded');
            break;
        case UPLOAD_ERR_EXTENSION:
            exit('File upload stopped by a PHP extension');
            break;
        case UPLOAD_ERR_FORM_SIZE:
            exit('File exceeds MAX_FILE_SIZE in the HTML form');
            break;
        case UPLOAD_ERR_INI_SIZE:
            exit('File exceeds upload_max_filesize in php.ini');
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            exit('Temporary folder not found');
            break;
        case UPLOAD_ERR_CANT_WRITE:
            exit('Failed to write file');
            break;
        default:
            exit('Unknown upload error');
            break;
    }
}


// Use fileinfo to get the mime type
//$finfo = new finfo(FILEINFO_MIME_TYPE);
//$mime_type = $finfo->file($_FILES["image"]["tmp_name"]);

//$mime_types = ["image/gif", "image/png", "image/jpeg"];
        
//if ( ! in_array($_FILES["image"]["type"], $mime_types)) {
//    exit("Invalid file type");
//}

// Replace any characters not \w- in the original filename
$pathinfo = pathinfo($_FILES["image"]["name"]);

$base = $pathinfo["filename"];

$base = preg_replace("/[^\w-]/", "_", $base);

$filename = $base . "." . $pathinfo["extension"];

$destination = __DIR__ . "/" . $filename;

// Add a numeric suffix if the file already exists
$i = 1;

while (file_exists($destination)) {

    $filename = $base . "($i)." . $pathinfo["extension"];
    $destination = __DIR__ . "/" . $filename;

    $i++;
}

if ( ! move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

    exit("Can't move uploaded file");

}

echo "File uploaded successfully.";

?>


</body>
</html>