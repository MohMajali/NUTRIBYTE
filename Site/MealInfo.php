<?php 

session_start();
include '../Connect.php';

$U_ID = $_SESSION['U_Log'];

if($U_ID){

  $sql1 = mysqli_query($dbConn, "select * from users where id='$U_ID'");
  $row1 = mysqli_fetch_array($sql1);

  $name = $row1['name'];
  $email = $row1['email'];

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>NUTRIBYTE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- Favicon -->
    <link href="./assets/img/logo2.png" rel="icon" />

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Libraries -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link href="./assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="./assets/lib/flaticon/font/flaticon.css" rel="stylesheet" />
    <link
      href="./assets/lib/owlcarousel/assets/owl.carousel.min.css"
      rel="stylesheet"
    />
    <link href="./assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="./assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Top Bar Start -->
    <div class="top-bar d-none d-md-block">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="top-bar-left">
              <div class="text">
                <i class="fa fa-phone-alt"></i>
                <h2>+962 799 999 999</h2>
                <p>For Appointment</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="top-bar-right">
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
        <a href="index.php" class="navbar-brand"
          ><img src="./assets/img/logo2.png"
        /></a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse">
          <div class="navbar-nav ml-auto">
            <a href="index.php" class="nav-item nav-link ">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="NuritionExperts.php" class="nav-item nav-link"
              >Nurition Experts</a
            >
            <a href="MealProvider.php" class="nav-item nav-link"
              >Meal Provider</a
            >

            <a href="contact.php" class="nav-item nav-link">Contact</a>

            <?php if(!$U_ID) { ?>

            <a href="Login.php" class="nav-item nav-link">Login</a>

            <?php } ?>

            <?php if($U_ID) { ?>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                ><?php echo $name?></a
              >
              <div class="dropdown-menu">
                <a href="./MyAccount.php" class="dropdown-item">My Account</a>
                <a href="./MyOrder.php" class="dropdown-item">My Orders</a>
                <a href="./MealInfo.php" class="dropdown-item">Food Plans</a>
                <a href="./InBodyTest.php" class="dropdown-item">InBody Test</a>
                <a href="./SelectPlan.php" class="dropdown-item">Subscription Payments</a>
                <a href="./logout.php" class="dropdown-item">Logout</a>
              </div>
            </div>

            <?php } ?>


          </div>
        </div>
      </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>Meals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->

    <div class="class">
      <div class="container">
        <div
          class="section-header text-center wow zoomIn"
          data-wow-delay="0.1s"
        >
          <p>Meals</p>
        </div>
        <div class="row class-container">

        <?php

          $sql1 = mysqli_query($dbConn, "SELECT * from categories ORDER BY id DESC");


    while ($row1 = mysqli_fetch_array($sql1)) {

        $m_id = $row1['id'];
        $m_name = $row1['name'];
        $m_image = $row1['image'];

        ?>

          <div
            class="col-lg-4 col-md-6 col-sm-12 class-item wow fadeInUp"
            data-wow-delay="0.0s">
            <div class="class-wrap">
              <div class="class-img">
                <img
                  src="<?php echo $m_image?>"
                  alt="Image"
                />
              </div>
              <div class="class-text">
                <div class="class-teacher">
                  <img src="<?php echo $m_image?>" alt="Image" />
                  <h3><?php echo $m_name?></h3>
                  <a href="./mealsInfo.php?id=<?php echo $m_id?>">+</a>
                </div>
                <h2>
                  <a class="anchor" href="./mealsInfo.php?id=<?php echo $m_id?>"
                    ><?php echo $m_name?></a>
                </h2>

              </div>
            </div>
          </div>
<?php } ?>
        </div>
      </div>
    </div>


    <!-- <div class="contact">
      <div class="container">
        <div
          class="section-header text-center wow zoomIn"
          data-wow-delay="0.1s"
        >
          <p>Meals Information</p>
          <h2>Look into you meals shedule</h2>
        </div>
        <div class="row">
          <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
            <table class="table">
              <thead class="">
                <tr>
                  <th scope="col">Meal Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Shedule</th> -->
                  <!-- <th scope="col">action</th> -->
                <!-- </tr>
              </thead>
              <tbody> -->
              <?php
$sql1 = mysqli_query($dbConn, "SELECT * from meal_plans WHERE user_id = '$U_ID' AND active = 1 ORDER BY id DESC");


    while ($row1 = mysqli_fetch_array($sql1)) {

        $f_id = $row1['id'];
        $f_name = $row1['name'];
        $f_image = $row1['image'];
        $f_description = $row1['description'];
        $f_price = $row1['price'];

        ?>
                <!-- <tr>
                  <th scope="row"><?php echo $f_name?></th>
                  <td><?php echo $f_price?>$</td>
                  <td><?php echo $f_description?></td> -->
                  <!-- <td>
                    <a class="" href="#" style="text-decoration: underline"
                      >action</a
                    >
                  </td> -->
                <!-- </tr> -->

                <!-- <?php } ?> -->

              <!-- </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Contact End -->

    <!-- Footer Start -->
        <?php include('./Footer.php');?>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/lib/easing/easing.min.js"></script>
    <script src="./assets/lib/wow/wow.min.js"></script>
    <script src="./assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./assets/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="./assets/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="./assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="./assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="./assets/js/main.js"></script>
    <script>
      function previewFile(inputObj) {
        var preview = document.querySelector("img.selectImage");
        var file = inputObj.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
          preview.src = reader.result;
        };

        if (file) {
          reader.readAsDataURL(file);
        } else {
          preview.src = "";
        }
      }
    </script>
  </body>
</html>
