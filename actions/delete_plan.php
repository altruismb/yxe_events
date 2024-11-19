<?php
include("../controllers/plan_controller.php");

$plan_id = $_GET['pid'];
      
 
$check = delete_plan_ctr($plan_id);
        

if($check){
header('location: ../view/a_plan.php'); 
}
else{
echo "Insertion failed!";  
}
    
?>