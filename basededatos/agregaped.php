<?php
require ("connectionbd.php");

if(isset($_POST['mat_c'])){
    foreach($_POST['mat_c'] as $animal){
        echo $animal;
    }
}

$h=$_POST['mat_c'];
var_dump($h);

if(isset($_POST['ins_c'])){
    foreach($_POST['ins_c'] as $ranimal){
        echo $ranimal;
    }
}
// print_r($_POST['ins_c']);
print_r($_POST['pla']);


?>