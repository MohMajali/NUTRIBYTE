<?php 

session_start();
include '../Connect.php';

$U_ID = $_SESSION['U_Log'];

if($U_ID){

  $sql1 = mysqli_query($dbConn, "select * from users where id='$U_ID'");
  $row1 = mysqli_fetch_array($sql1);

  $name = $row1['name'];
  $email = $row1['email'];
  $phone = $row1['phone'];
  $password = $row1['password'];

  if (isset($_POST['Submit'])) {

    $ID = $_POST['U_ID'];
    $name = $_POST['username'];
    $email = $_POST['Email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


        $update = mysqli_query($dbConn, "UPDATE users SET name ='$name',email = '$email', phone ='$phone', password ='$password' WHERE id ='$ID'");
    

              echo "<script language='JavaScript'>
              alert ('Account Has Been Updated Successfully !');
          </script>";

                  echo "<script language='JavaScript'>
          document.location='MyAccount.php';
          </script>";

}

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
            <h2>My Account</h2>
          </div>
          <div class="col-12">
            <a href="">Home</a>
            <a href="">My Account</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="contact">
      <div class="container">
        <div
          class="section-header text-center wow zoomIn"
          data-wow-delay="0.1s"
        >
          <p>My Account</p>
          <h2>You can edit your info</h2>
        </div>
        <div class="row">
          <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="contact-form">
              <div id="success"></div>
              <form name="contactForm" id="contactForm" method="POST" action="MyAccount.php" novalidate="novalidate">

              <input type="hidden" name="U_ID" value="<?php echo $U_ID?>">
                <!-- <div class="col-12 d-flex align-items-center mb-3 p-0">
                  <div class="col-3 h150 p-0">
                    <p class="mr-3">Select image:</p>
                  </div>
                  <div class="col-9 d-flex align-items-center h150 p-0">
                    <img
                      class="selectImage pr-3"
                      src="/assets/img/nonuserimg-gray.png"
                      alt="Image preview..."
                    />
                    <input
                      class="form-control form-control-file h-100"
                      type="file"
                      accept="image/x-png,image/gif,image/jpeg"
                      onchange="previewFile(this)"
                    /><br /><br />
                  </div>
                </div> -->

                <div class="control-group">
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Your Name"
                    required="required"
                    value="<?php echo $name?>"
                    name="username"
            
                    data-validation-required-message="Please enter your name"
                  />
                  <p class="help-block text-danger"></p>
                </div>
                
                <div class="control-group">
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Your Email"
                    value="<?php echo $email?>"
                    name="Email"
                    data-validation-required-message="Please enter your email"
                    required
                  />
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                  <input
                    type="number"
                    min="0"
                    class="form-control"
                    id="phone"
                    placeholder="Your Phone Number"
                    value="<?php echo $phone?>"
                    
                    required
                    pattern="[0-9]{10}" 
                    title="Phone Number Must Be 10 Numbers"
                    name="phone"
                    data-validation-required-message="Please enter a phone number"
                  />
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Your Password"
                    value="<?php echo $password?>"

                    required
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Must Contain At Least One Number And One Uppercase And Lowercase Letter, And At Least 8 Or More Characters"
                    name="password"
                    data-validation-required-message="Please enter a password"
                  />
                  <p class="help-block text-danger"></p>
                </div>

                <div>
                  <button class="btn" type="submit" name="Submit" id="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
