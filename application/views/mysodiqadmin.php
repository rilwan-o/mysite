<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="http://localhost/mysite/style/main.css" >
<title>admin page</title>
</head>
<body>
<h1>Upload page</h1>
<?php 
echo "<div id='error'>".validation_errors()."</div>";
echo "<div id='error'>".$error."</div>";
?>
<?php 

 echo form_open_multipart('http://localhost/mysite/index.php/mainController/uploadFile');
?>
  <p>beat title:<input type='text' name='title' id='title'/></p>
  <p>Select song to upload: <input type='file' name='fileToUpload' id='fileToUpload'>
   
   <input type='submit' value='Upload Sound' name='submit'></p>
 
</form>
</body>
</html>