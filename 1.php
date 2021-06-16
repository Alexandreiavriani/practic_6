<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
  <?php  error_reporting(0);?>
</head>

<?php

if(isset($_POST['send'])){
    $large_size="";
    $type_size="";
    
    $file=$_FILES['myfile'];
   

    if($file['size']>50*1024*1024){
        $large_size="large size";
    }
    $file_type=pathinfo($file['name'] , PATHINFO_EXTENSION);
   
    if($file_type!="txt"){
        $type_size="type error";
        
    }
    
 
    
       
}
$file=$_FILES['myfile'];

move_uploaded_file($file['tmp_name'],"myFolder/".$file['name']);
$files=scandir('myFolder');
        
    
       for($i=2;$i<count($files);$i++){
       
        
    
    




?>
<br><br>
<li><?=$files[$i]?></li>



<p><a download href="myFolder/<?=$files[$i]?>">Download<?=$files[$i]?></a></p>
<p><a href="1.php?file=<?=$i?>">Show<?=$files[$i]?></a></p>

<p><a href="1.php?delete=<?=$i?>">Delete'<?=$files[$i]?></a></p>

<?php
       
       }  

?>
<?php
  



if(isset($_GET['file'])){
    $f="myFolder/".$files[$_GET['file']];
    $fopen=fopen($f,'r');
    $file_content=fread($fopen,filesize($f));
    fclose($fopen);
    
    echo $file_content;
       }
       if(isset($_GET['delete'])){

        $fname=$f="myFolder/".$files[$_GET['delete']];;
        unlink($fname);

        if (unlink($fname)) {
            echo 'The file ' . $fname . ' was deleted successfully!';
        } else {
            echo 'თუ ვერ წაშალა დააჭირეთ კიდევ ერთხელ წაშლი ღილაკს!! ' . $fname;
        }

      
       }
    
     



?>

<body>
<form method='post' enctype="multipart/form-data" > <?=$large_size?> <?=$type_size?>

<input type="file" name='myfile'>

<br><br>
<button name='send'>upload file in folder</button>
<br><br>

</form>
    
</body>
</html>