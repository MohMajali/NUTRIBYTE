<?php

session_start();
include '../Connect.php';

$U_ID = $_SESSION['U_Log'];

if ($U_ID) {

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
        <a href="index.php" class="navbar-brand">
          <img src="./assets/img/logo2.png" width="125px" />
        </a>
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

            <?php if (!$U_ID) {?>

            <a href="Login.php" class="nav-item nav-link">Login</a>

            <?php }?>

            <?php if ($U_ID) {?>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                ><?php echo $name ?></a
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

            <?php }?>


          </div>
        </div>

      </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Hero Start -->
    <div class="hero">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-sm-12 col-md-6">
            <div class="hero-text">
              <h1>Sport Practice For Good Health</h1>
              <p>
                Lorem ipsum dolor sit amet elit. Phasell nec pretum mi. Curabi
                ornare velit non. Aliqua metus tortor auctor quis sem.
              </p>
              <div class="hero-btn">
                <a class="btn" href="./Login.php">Join Now</a>
                <a class="btn" href="./contact.php">Contact Us</a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 d-none d-md-block">
            <div class="hero-image">
              <img src="./assets/img/coach.png" alt="Hero Image" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero End -->

    <!-- About Start -->
    <div class="about wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="./assets/img/about.png" alt="Image" />
            </div>
          </div>
          <div class="col-lg-7 col-md-6">
            <div class="section-header text-left">
              <p>Learn About Us</p>
              <h2>Welcome to NUTRIBYTE</h2>
            </div>
            <div class="about-text">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                vulputate. Aliquam metus tortor, auctor id gravida condimentum,
                viverra quis sem.
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                vulputate. Aliquam metus tortor, auctor id gravida condimentum,
                viverra quis sem. Curabitur non nisl nec nisi scelerisque
                maximus.
              </p>
              <a class="btn" href="./about.php">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Class Start -->
    <div class="class">
      <div class="container">
        <div
          class="section-header text-center wow zoomIn"
          data-wow-delay="0.1s"
        >
          <p>Our Categories</p>
          <!-- <h2>Nurition Experts Shedule</h2> -->
        </div>
        <div class="row class-container">

        <?php
$sql1 = mysqli_query($dbConn, "SELECT * from categories ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $c_id = $row1['id'];
    $c_name = $row1['name'];
    $c_image = $row1['image'];

    ?>

          <div
            class="col-lg-4 col-md-6 col-sm-12 class-item wow fadeInUp"
            data-wow-delay="0.4s">
              <div class="class-wrap">
                <div class="class-img">
                  <img
                    src="<?php echo $c_image ?>"
                    alt="Image"
                  />
                </div>
                <div class="class-text">
                  <div class="class-teacher">
                    <img
                      src="<?php echo $c_image ?>"
                      alt="Image"
                    />
                    <h3><?php echo $c_name ?></h3>
                    <a href="./NuritionExperts.php?category_id=<?php echo $c_id ?>">+</a>
                  </div>
                </div>
              </div>
          </div>

<?php }?>

        </div>
      </div>
    </div>
    <!-- Class End -->

    <!-- Class Start -->
    <!-- <div class="class">
      <div class="container">
        <div
          class="section-header text-center wow zoomIn"
          data-wow-delay="0.1s"
        >
          <p>Our Meal Providers</p>
          <h2>Meal Providers</h2>
        </div>

        <div class="row class-container"> -->

        <?php
$sql1 = mysqli_query($dbConn, "SELECT * from providers WHERE active = 1 ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $p_id = $row1['id'];
    $p_name = $row1['name'];
    $p_image = $row1['image'];

    ?>

          <!-- <div
            class="col-lg-4 col-md-6 col-sm-12 class-item wow fadeInUp"
            data-wow-delay="0.0s"
          >
            <div class="class-wrap">
              <div class="class-img">
                <img
                  src="../Provider_Dashboard/<?php echo $p_image ?>"
                  alt="Image"
                />
              </div>
              <div class="class-text">
                <h2>
                  <a class="anchor" href="./MealProviderDetails.php?id=<?php echo $p_id ?>"
                    ><?php echo $p_name ?></a
                  > -->
                <!-- </h2> -->
                <!-- <div class="class-meta">
                  <p><i class="fas fa-map-marker-alt"></i></p>
                  <p><i class="far fa-money-bill"></i></p>
                </div> -->
              <!-- </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div> -->
    <!-- Class End -->

    <!-- Class Start -->
    <div class="class">
      <div class="container">
        <div
          class="section-header text-center wow zoomIn"
          data-wow-delay="0.1s"
        >
          <p> Advertisment</p>
          <h2>Advertisment</h2>
        </div>

        <div class="row class-container">

        <?php
$sql1 = mysqli_query($dbConn, "SELECT * from advertisements WHERE active = 1 ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $adv_id = $row1['id'];
    $title = $row1['title'];
    $description = $row1['description'];
    $adv_image = $row1['image'];

    ?>

          <div
            class="col-lg-4 col-md-6 col-sm-12 class-item wow fadeInUp"
            data-wow-delay="0.0s">
            <div class="class-wrap">
              <div class="class-img">
                <img
                  src="../Admin_Dashboard/<?php echo $adv_image ?>"
                  alt="Image"
                />
              </div>
              <div class="class-text">
                <h2><a class="anchor"><?php echo $title ?></a></h2>
                <div class="class-meta">
                  <p><?php echo $description ?></p>
                </div>
              </div>
            </div>
          </div>
<?php }?>
        </div>
      </div>
    </div>
    <!-- Class End -->

    <!-- Footer Start -->
      <?php include './Footer.php';?>
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
