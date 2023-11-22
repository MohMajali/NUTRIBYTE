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

if(isset($_POST['SUBMIT'])){

  $user_id = $_POST['user_id'];
  $heigh = $_POST['heigh'];
  $intraoelluar_water = $_POST['intraoelluar_water'];
  $extraoelluar_water	= $_POST['extraoelluar_water'];
  $lean_mass = $_POST['lean_mass'];
  $fat_mass = $_POST['fat_mass'];
  $body_water = $_POST['body_water'];
  $weight = $_POST['weight'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $file;

  move_uploaded_file($_FILES["file"]["tmp_name"], "InBodyTest/" . $_FILES["file"]["name"]);

  $file = $_FILES["file"]["name"];
  $file = 'InBodyTest/' . $file;

  $insert = mysqli_query($dbConn, "INSERT INTO in_body_tests (user_id, heigh, intraoelluar_water, extraoelluar_water, lean_mass, fat_mass, body_water, weight, age, gender, image)

  Values ('$user_id', '$heigh', '$intraoelluar_water', '$extraoelluar_water', '$lean_mass', '$fat_mass', '$body_water', '$weight', '$age', '$gender', '$file')");

          echo '<script language="JavaScript">
          alert ("Test Added Successfully !")
            </script>';

              echo '<script language="JavaScript">
          document.location="./InBodyTest.php";
          </script>';
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
        <a href="index.html" class="navbar-brand"
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
            <a href="index.php" class="nav-item nav-link">Home</a>
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
    <div class="contact">
      <div class="container">
        <div
          class="section-header text-center wow zoomIn"
          data-wow-delay="0.1s"
        >
          <h3>Inbody Test</h3>
        </div>
        <div class="row">
          <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="contact-form">
              <form name="inbodyForm" id="inbodyForm" novalidate="novalidate" method="POST" action="InBodyTest.php" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $U_ID ?>">
                <p>Body Composition Analysis</p>

                <div class="row">

                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="heigh"
                        name="heigh"
                        placeholder="Your height in cm"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="intraoelluarwater"
                        placeholder="Enter your intraoelluar water"
                        name="intraoelluar_water"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="extraoelluarwater"
                        placeholder="Enter your extraoelluar water"
                        name="extraoelluar_water"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>

                </div>

                <div class="row">


                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="dryleanmass"
                        placeholder="Enter your dry lean mass"
                        name="lean_mass"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="bodyfatmass"
                        placeholder="Enter your body fat mass"
                        name="fat_mass"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="totalbodywater"
                        placeholder="Enter your total body water"
                        name="body_water"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="weight"
                        placeholder="Enter your weight"
                        name="weight"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="control-group">
                      <input
                        type="number"
                        min="0" step="0.01"
                        class="form-control"
                        id="age"
                        placeholder="Enter your age"
                        name="age"
                        required="required"
                        required
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>

                </div>

                <div class="row mb-3">

                  <div class="col-12">
                    <div class="control-group">
                      <select name="gender" id="gender" class="form-control">
                        <option value="male">male</option>
                        <option value="female">female</option>
                      </select>
                    </div>
                  </div>

                </div>

                <p>Body Composition Analysis</p>
                <div class="control-group">
                  <input
                    type="file"
                    class="form-control"
                    id="file"
                    name="file"
                    placeholder="Enter your file"
                    required="required"
                    style="padding: 7px"
                  />
                  <p class="help-block text-danger"></p>
                </div>

                <div>
                  <button class="btn" type="submit" name="SUBMIT" id="sendMessageButton">
                    Submit
                  </button>
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
  </body>
</html>
