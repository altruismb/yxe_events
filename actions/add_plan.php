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
    
    // Sanitize the file name to prevent path traversal
$safe_filename = basename($tmp); // Removes directory traversal elements
$targetdir = rtrim($targetdir, '/') . '/' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $safe_filename); // Replaces invalid characters

// Validate the file type (e.g., only allow specific extensions)
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf']; // Adjust based on your requirements
$file_extension = pathinfo($safe_filename, PATHINFO_EXTENSION);

if (in_array(strtolower($file_extension), $allowed_extensions)) {
    // Move the file only if it passes the checks
    if (move_uploaded_file($tmp, $targetdir)) {
        $check = add_product_ctrl($pcat, $pbrand, $ptitle, $pprice, $pdescr, $targetdir, $pkey);
    } else {
        echo "Failed to move the uploaded file.";
    }
} else {
    echo "Invalid file type.";
}


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
