<?php
include("../controllers/plan_controller.php");

$style_id = $_GET['sid'];
      

$check = delete_style_ctr($style_id);
        

if($check){
header('location: ../view/a_addstyles.php'); 
}
else{
echo "Insertion failed!";  
}
    
?>