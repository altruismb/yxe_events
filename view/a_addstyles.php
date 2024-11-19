<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION['role'] != 1){
    header("location: ../index.php");
    exit;
}

require("../controllers/plan_controller.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Target Age Group</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/dash/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../css/dash/admin_bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/dash/admin_templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="a_dashboard.php">
          <h1 class="tm-site-title mb-0">Administrator</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
          <li class="nav-item">
            <a class="nav-link" href="a_plan.php">
              <i class="fa fa-home"></i>
              Events
            </a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="a_addcategories.php">
                    <i class="fas fa-square"></i>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="a_addstyles.php">
                    <i class="fa fa-map"></i>
                    Target Group
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="a_viewaccounts.php">
                    <i class="far fa-user"></i>
                    Users Accounts
                </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="../actions/logout.php">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        <div class="container tm-mt-big tm-mb-big">
          <div class="row">
            <div class="d-flex justify-content-center">
              <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                  <div class="col-12">
                    <h2 class="tm-block-title d-inline-block">Add Age Group</h2>
                  </div>
                </div>
                <div class="row tm-edit-product-row">
                  <div class="col-xl-6 col-lg-6 col-md-12">
                    <form action="../actions/styleprocess.php" method="POST" class="tm-edit-product-form">
                      <div class="form-group mb-3">
                        <label for="name">Age Target Group</label>
                        <input id="style_name" name="style_name" type="text" class="form-control validate" required/>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                  </div>
                  <div class="col-6">
                    <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Add Age Group</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <center><h2 class="tm-block-title">Target Age Group</h2></center>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>

                <?php
                  $stylelist = select_all_styles_ctrl();
                  foreach ($stylelist as $value){ 
                  $sid = $value['style_id'];
                ?>
                
                  <tr>
                    <td class="tm-product-name"><?php echo ($value['style_name']);
                     $sid = $value['style_id'] ?></td>
                    <td class="text-center">
                     <a href='./a_updatestyle.php?sid=<?php echo($sid);?>'class="tm-product-delete-link">
                            <i class="far fa-edit tm-product-delete-icon"></i>
                      </a>
                      <!-- <a href="../actions/delete_style.php?sid=<?php echo($sid);?>" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a> -->
                      <?php
                  }?>
                    </td>
                </tbody>
              </table>
            </div>
          </div>


        
      
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2022</b> All rights reserved. 
          
          YXEEVENTS<a rel="nofollow noopener" href="" class="tm-footer-link"></a>
        </p>
      </div>
    </footer>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->

  </body>
</html>