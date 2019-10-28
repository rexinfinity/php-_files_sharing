<?php
?>
<?PHP
$maxsize = 10242880;
if(!empty($_FILES['uploaded_file']) && ($_FILES['file']['size'] <= $maxsize))
  { 
    $notallowed1 = "html";
    $notallowed2 = "php";
    $notallowed3 = "css";
    $notallowed4 = "js";
    $notallowed5 = "java";
    $d = dirname($_SERVER['PHP_SELF']);
    $filesize = $_FILES['uploaded_file']['size'];
    $baseurl = $_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']);
    $ext = pathinfo($_FILES['uploaded_file']['name'], PATHINFO_EXTENSION);
    $md5 = substr(md5_file($_FILES['uploaded_file']['tmp_name']), 0, 7);
    $newname = time().$md5.'.'.$ext;
    $path = "files/";
    $path = $path . $newname;
    if($ext == $notallowed1 or $ext == $notallowed2 or $ext == $notallowed3 or $ext == $notallowed4 or $ext == $notallowed5){
echo "<center><br><br><br><img width='100' height='100' src='notallowed.gif'><br><br>Zip First For Upload PHP,HTML,css,js & java File";
}else{

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      $fileurl = 'http://'.$baseurl.$path;

     // file size converter
     if ($filesize >= 1048576)
        {
            $mb = number_format($filesize / 1048576, 2) . ' MB';
        }
        elseif ($filesize >= 1024)
        {
            $mb = number_format($filesize / 1024, 2) . ' KB';
        }
        elseif ($filesize > 1)
        {
            $mb = $filesize . ' bytes';
        }
        elseif ($filesize == 1)
        {
            $mb = $filesize . ' byte';
        }
        else
        {
            $mb = '0 bytes';
        }

     // file Create
     $html = $md5;
     $filename = $_FILES['uploaded_file']['name'];
     $date_utc = new \DateTime("now", new \DateTimeZone("UTC"));
     $content = "<center><br><a href='$d'>Upload a new file</a><br><br>Upload Time :".$date_utc->format(\DateTime::RFC850)."<br>File Size :  $mb <br><br>File <br><a href='$fileurl'>$filename</a><br><br><br>";
      
     $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/file/$html.php" ,"wb");
     fwrite($fp,$content);
     fclose($fp);
     $linkurl = 'http://'.$baseurl.'file/'.$html.'.php';
     
      echo "<center><img width='100' height='100' src='done.png'><br><br>File Upload Complate ! File Size : $mb <br>Time :".$date_utc->format(\DateTime::RFC850)." <br><br>Here is Your Link<br>".  "<input type='text' size='50' value='$linkurl' readonly>" . 
      "</center>";
    } else{
        echo "<center>There was an error uploading the file, please try again!</center>";
    }
  }
}
echo "<center><br><br><br><a href='./'>Back</a></center>";

?>