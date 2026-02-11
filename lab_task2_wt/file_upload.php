<!DOCTYPE html>
<html>
<head>
    <title>file uploading</title>
</head>
<body>
    <h1>file uploading button</h1>
    <form method="post"  enctype="multipart/form-data">
    select file to upload:
    <input type="file" name="filetoupload"  id="filetoupload">  
    <input type="submit" name="submit" value="upload">  
    </form>

</body>
<?php 
if(isset($_POST["submit"])){

if($_FILES["filetoupload"]["name"] == ""){
        echo "Please select a file first";
        exit();
    }
$upload=1;
$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["filetoupload"]["name"]);
$fileex=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($fileex !="txt" && $fileex !="pdf"){
    echo "only pdf and txt allowed";
    $upload=0;
}
if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_file)){

    echo "file  ".htmlspecialchars(basename($_FILES["filetoupload"]["name"]))."has been uploading";
      echo "<a href='$target_file' download>
                    <button>Download File</button>
                  </a>";
}
else{
    echo "error while uploading";
}




}
?>



</html>



