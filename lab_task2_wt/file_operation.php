<?php 
#echo readfile("uploads/new 1.txt");

// $f=fopen("uploads/new 1.txt","r");
// echo fread($f,filesize("uploads/new 1.txt"));
// fclose($f);
// $f1=fopen("uploads/new 1.txt","w");
// fwrite($f1,"nagaraju");
// fclose($f1);
// echo file_get_contents("uploads/new 1.txt");
// file_put_contents("uploads/new 1.txt","this is worked successfully");
// $f1=fopen("uploads/new 1.txt","a");
// fwrite($f1,"/n nagaraju");
// fclose($f1);
// $data=file("uploads/new 1.txt");
// print_r($data);





// $file="uploads/new 1.txt";

// echo file_exists($file) ? "File exists<br>" : "Not exists<br>";
// echo "File size: ".filesize($file)."<br>";
// echo "File type: ".filetype($file)."<br>";
// echo "Last accessed: ".date("d-m-y h:i:s",fileatime($file))."<br>";
// echo "Last modified: ".date("d-m-y h:i:s",filemtime($file))."<br>";
// echo "Created time: ".date("d-m-y h:i:s",filectime($file))."<br>";
// echo "Permissions: ".fileperms($file)."<br>";
// echo "Owner: ".fileowner($file)."<br>";
// echo "Group: ".filegroup($file)."<br>";
// echo "Inode: ".fileinode($file)."<br>";


// copy("uploads/new 1.txt","uploads/copy.txt");
// echo "file copied";
// mkdir("foldermine");
// echo "folder created";
// rmdir("foldermine");
// echo "folder whuch is created is currently deleted";

// if(is_dir("uploads")){
//     echo "it is a folder ";
// }
// if(is_file("uploads/copy.txt")){
//     echo "it is a file";
// }

// print_r(scandir("."));

// $dir=opendir("uploads");
// while(($file=readdir($dir)) !==false){
//     echo $file."<br>";
// }

// closedir($dir);

//file creation 

$file = fopen("uploads/new.txt","x");
fwrite($file,"New file created");
fclose($file);




?>