<?php
include("../controllers/plan_controller.php");

$cat_id = $_GET['cid'];
      
$check = delete_category_ctr($cat_id);
        

if($check){
header('location: ../view/a_addcategories.php'); 
}
else{
echo "Insertion failed!";  
}
    
?>