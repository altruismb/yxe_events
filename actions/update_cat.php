<?php
include("../controllers/plan_controller.php");

//retrieve the updated value 
if(isset($_POST['submit'])){
    $cat_id =$_POST['cat_id'];
    $cat_name =$_POST['update_cat'];
    
    update_all_category_ctrl($cat_id, $cat_name);
    header('location: ../view/a_addcategories.php');
}

?>