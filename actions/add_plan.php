<?php
require("../controllers/plan_controller.php");
require("../functions/function.php");

if(isset($_POST['add_product'])){
    $pcat = $_POST['category'];
    $pbrand = $_POST['style'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['pprice'];
    $pdescr = $_POST['pdescr'];
    $pkey = $_POST['pkey'];


    //Add image
    $pimage = $_FILES['pimage']["name"];
    $targetdir = "../images/product/".$pimage;
    $image = $targetdir.$pimage;
    $tmp = $_FILES['pimage']["tmp_name"];
    
    if(move_uploaded_file($tmp,$targetdir)){
        $check= add_product_ctrl($pcat, $pbrand, $ptitle, $pprice, $pdescr, $targetdir, $pkey);

        if ($check) {
            echo "Entry Successful";
            header("Location: ../view/a_plan.php");
        }
        else{
            echo "not working";
        }
     }else{
        echo "<script>alert('Add Image')</script>";
        echo "<script>window.open('../view/a_addplan.php','_self')</script>";
    }

}
