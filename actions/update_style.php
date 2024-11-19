<?php
include("../controllers/plan_controller.php");

//retrieving the updated value 
if(isset($_POST['submit'])){
    $style_id =$_POST['style_id'];
    $style_name =$_POST['update_style'];
    
    update_all_styles_ctrl($style_id, $style_name);
    header('location: ../view/a_addstyles.php');
}

?>