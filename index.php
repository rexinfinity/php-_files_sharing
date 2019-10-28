<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
<center>
  <form enctype="multipart/form-data" action="7664sdjkj.php" method="POST">
<br><br><img width='100' height='100' src='share.png'><br>
    <p>Upload your file</p>
No pornography, malware or other illegal content according to Bangladeshi law!<br>
    <input type="hidden" name="MAX_FILE_SIZE" value="10242880" />
    Choose a file to upload: (10.24 MB Max)<br /><br><br>
    <input type="file"  name="uploaded_file" ></input><br /><br><br>
    <input type="submit" value="Upload"></input>
  </form></center><br><br>
</body>
</html>
<center>
<?php
$directory = "./files/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}
echo "There were $filecount files are hosted";
?>
</center>
