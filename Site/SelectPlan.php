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
    <link href="./assets/css/plan.css" rel="stylesheet" />
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
            <a href="index.php" class="nav-item nav-link active">Home</a>
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
            <h2>Contact</h2>
          </div>
          <div class="col-12">
            <a href="">Home</a>
            <a href="">Contact</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->

    <div class="demo-wrap">
      <div class="demo-header">
        <h1>Select Plan</h1>
      </div>

      <!-- PRICING PLANS -->
      <section class="pricing-plans">
        <!-- Pricing Tables -->
        <div class="pricing-tables">
          <!-- Plan Features -->
          
          <div class="pricing-plan">
            <h2 class="plan-title">Basic</h2>
            <div class="plan-cost">
              <p class="plan-price">$29</p>
              <span>/</span>
              <p class="plan-type">One Moth</p>
            </div>
            <ul class="plan-features">
              <li>One Meal Each Two Days</li>
              <li>shedule a meal for a One Moth</li>
              <li>two weak validaty</li>
              <li>chat with nuration expert</li>
            </ul>
            <a class="btn-plan" href="./Visa.php?payment=1&&Subscription_Type=1">Select Plan</a>
          </div>
          <!-- "Basic" Plan -->

          <div class="pricing-plan featured-plan">
            <div class="featured-ribbon">Best Value</div>
            <h2 class="plan-title">Premium</h2>
            <div class="plan-cost">
              <p class="plan-price">$59</p>
              <span>/</span>
              <p class="plan-type">Three Months</p>
            </div>
            <ul class="plan-features">
              <li>One Meal Each Two Days</li>
              <li>shedule a meal for Three Months</li>
              <li>one month validaty</li>
              <li>chat with nuration expert</li>
            </ul>
            <a class="btn-plan cta" href="./Visa.php?payment=1&&Subscription_Type=2">Select Plan</a>
          </div>

          <!-- "Ultmate" Plan -->
          <div class="pricing-plan">
            <h2 class="plan-title">Ultimate</h2>
            <div class="plan-cost">
              <p class="plan-price">$89</p>
              <span>/</span>
              <p class="plan-type">Six Months</p>
            </div>
            <ul class="plan-features">
              <li>One Meal each one day</li>
              <li>shedule a meal for Six Months</li>
              <li>two month validaty</li>
              <li>chat with nuration expert</li>
            </ul>
            <a class="btn-plan" href="./Visa.php?payment=1&&Subscription_Type=3">Select Plan</a>
          </div>

        </div>
      </section>
    </div>
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
  </body>
</html>
