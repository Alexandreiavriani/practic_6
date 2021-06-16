<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
</head>
<body>

<?php

$files=scandir('myFolder');

for($i=2;$i<count($files);$i++){
   echo '<p><a href="show.php?file='.$i.'">'.$files[$i].'</a></p>';
}
?>

<div>

</div>

 
<?php


if(isset($_GET['file'])){
    $f="myFolder/".$files[$_GET['file']];
    $fopen=fopen($f,'r');
    $file_content=fread($fopen,filesize($f));
    fclose($fopen);
    
    echo $file_content;
       }
      
    



?>


    
</body>
</html>