<?php
require("../controllers/plan_controller.php");
include("../settings/core.php");

//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pcat = $_POST['category'];
    $pbrand = $_POST['style'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['pprice'];
    $pdesc = $_POST['pdescr'];
    //$pimage = $_POST['pimage'];
    $pkey = $_POST['pkey'];

    //adding image
    $pimage = $_FILES['editpimage']['name'];
    //echo $pimage;
    $targetdir = "../images/product/".$pimage;
    $image = $targetdir.$pimage;
    $tmp = $_FILES['editpimage']["tmp_name"];
    
    $pid = $_POST['id'];
    // echo($pid);

    if(move_uploaded_file($tmp,$targetdir)){
        $check_update = update_all_plan_ctrl($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $targetdir, $pkey);
        if ($check_update) {
            header("Location: ../view/a_plan.php");
        }

        else{
            echo "not working";
        }
    }else{
        echo "<script>alert('Fill all requirements to update')</script>";
        echo "<script>window.open('../view/a_plan.php','_self')</script>";
    }

}



?>