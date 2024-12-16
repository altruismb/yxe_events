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
// Ensure the target directory is a valid and trusted directory
$targetdir = rtrim(realpath($targetdir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

// Sanitize the file name to prevent directory traversal
$safe_filename = basename($tmp); // Removes directory traversal elements
$safe_filename = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $safe_filename); // Allows only safe characters

// Construct the full target path
$target_file = $targetdir . $safe_filename;

// Ensure the temporary file exists and is a valid uploaded file

   // Sanitize the uploaded file name to avoid path traversal
$filename = basename($tmp);  // Get the base file name (removes directory information)
$targetPath = $targetdir . DIRECTORY_SEPARATOR . $filename;  // Safely construct the target path

// Ensure the file is uploaded correctly and is a valid file type
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];  // Define allowed file types (example for images)

// Check if the file type is valid
if (in_array(mime_content_type($tmp), $allowedTypes)) {
    // Ensure the file is moved to the correct location
    if (move_uploaded_file($tmp, $targetPath)) {
        // Call the update function
        $check_update = update_all_plan_ctrl($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $targetdir, $pkey);
        
        if ($check_update) {
            header("Location: ../view/a_plan.php");
            exit();  // Ensure no further code is executed after redirect
        } else {
            echo "Error: Failed to update plan.";
        }
    } else {
        echo "Error: Failed to move the uploaded file.";
    }
} else {
    echo "Error: Invalid file type. Only JPEG, PNG, and GIF files are allowed.";
}
{
        echo "<script>alert('Fill all requirements to update')</script>";
        echo "<script>window.open('../view/a_plan.php','_self')</script>";
    }

}



?>