<?php

include("../controllers/plan_controller.php");

$style_name = $_POST['style_name'];

$style_check = add_style_ctrl($style_name);

if ($style_check) {
	echo "Style name inserted successfully";
	header('Location: ../view/a_addstyles.php');
}
else{
	echo "style name insertion failed";
}

?>

