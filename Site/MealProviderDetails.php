<?php 

session_start();
include '../Connect.php';

$U_ID = $_SESSION['U_Log'];
$M_ID = $_GET['id'];

if($U_ID){

  $sql1 = mysqli_query($dbConn, "select * from users where id='$U_ID'");
  $row1 = mysqli_fetch_array($sql1);

  $name = $row1['name'];
  $email = $row1['email'];

}

$sql2 = mysqli_query($dbConn, "SELECT * FROM providers WHERE id='$M_ID'");
$row2 = mysqli_fetch_array($sql2);

$p_name = $row2['name'];
$p_email = $row2['email'];
$p_image = $row2['image'];
$p_description = $row2['description'];


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
            <a href="MealProvider.php" class="nav-item nav-link active"
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
            <h2><?php echo $p_name?></h2>
          </div>
          <div class="col-12">
            <a href="">Home</a>
            <a href=""><?php echo $p_name?></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Single Post Start-->
    <div class="single">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            
            <div class="single-content wow fadeInUp">
              <h2><?php echo $p_name?></h2>
              <img
                src="../Provider_Dashboard/<?php echo $p_image?>"
                style="max-height: 500px; object-fit: cover"
              />

              <p>
              <?php echo $p_description?>
              </p>
            </div>

            <div class="class">
              <div class="container">
                <div
                  class="section-header text-center wow zoomIn"
                  data-wow-delay="0.1s"
                >
                  <p>Your Meals</p>
                  <h2>Meals</h2>
                </div>

                <div class="row class-container">

                <?php
$sql1 = mysqli_query($dbConn, "SELECT * from meal_plans WHERE user_id = '$U_ID' AND active = 1 AND price != 0 ORDER BY id DESC");


    while ($row1 = mysqli_fetch_array($sql1)) {

        $f_id = $row1['id'];
        $expert_id = $row1['expert_id'];
        $f_name = $row1['name'];
        $f_price = $row1['price'];
        $f_image = $row1['image'];

        ?>

                  <div
                    class="col-lg-4 col-md-6 col-sm-12 class-item wow fadeInUp"
                    data-wow-delay="0.0s">
                    <div class="class-wrap">
                      <div class="class-img">
                        <img
                          src="../Nutrionist_Dashboard/<?php echo $f_image?>"
                          alt="Image"
                        />
                      </div>
                      <div class="class-text">
                        <h2>
                        <?php echo $f_name ?>
                          <!-- <a class="anchor" href="./MealProviderDetails.php"
                            ></a> -->
                        </h2>
                        <div class="class-meta flex-column align-items-start">  
                            <p><i class="fas fa-wallet"></i><?php echo $f_price ?> JOD</p>
                          <div class="price pt-0">
                            <div class="price-action">

                              <a class="btn w-100 my-1" 
                              href="./Visa.php?mealId=<?php echo $f_id?>&&nutrionId=<?php echo $expert_id?>&&providerId=<?php echo $M_ID?>&&order=2"

                              onclick="checkPrice(event, <?php echo $f_price?>)"

                              >Delivary</a>

                              <a class="btn w-100 my-1" 
                              href="./Visa.php?mealId=<?php echo $f_id?>&&nutrionId=<?php echo $expert_id?>&&providerId=<?php echo $M_ID?>&&order=2"

                              onclick="checkPrice(event, <?php echo $f_price?>)"

                              >On Site</a>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<?php } ?>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="col-lg-4">
            <div class="sidebar">

              <div class="sidebar-widget wow fadeInUp">
                <div
                  class="d-flex align-items-center justify-content-between widget-title"
                >
                  <h2 class=" ">Class Price:</h2>
                  <h2>30 JOD</h2>
                </div>
                <div
                  class="d-flex align-items-center justify-content-between widget-title"
                >
                  <h4 class="ms-0 ps-0">Every Two Weeks</h4>
                  <h4 class="me-0 pe-0"><i class="far fa-clock"></i></h4>
                </div>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </div>
    <!-- Single Post End-->

    <!-- Footer Start -->
    <?php include('./Footer.php');?>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->

    <script>

          function checkPrice(e, price){

            //./Visa.php?mealId=<?php echo $f_id?>&&nutrionId=<?php echo $expert_id?>&&providerId=<?php echo $M_ID?>&&order=2

            if(price == 0){

              console.log("heeelloo")
                alert('Please wait until Provider put price !');
                e.preventDefault();

            } else {
                            // e.preventDefault();
            }
}
    </script>
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
      document.querySelectorAll(".single-tags-page a").forEach((el) => {
        el.addEventListener("click", (e) => {
          e.preventDefault();
          document.querySelectorAll(".single-tags-page a").forEach((el) => {
            el.classList.remove("active");
          });
          e.path[0].classList.add("active");
        });
      });
    </script>
    <script>
      let inputCount = 1;
      document.querySelectorAll(".btn-reply").forEach((btn) => {
        btn.addEventListener("click", btnReplyFunc);
      });

      function btnReplyFunc(e) {
        e.preventDefault();
        console.log(e);
        console.log(e.path[1]);

        textAreaForm = `
                 <form>
                     <div class='control-group'>
                         <textarea class='form-control' id='inputCount-${inputCount}' name='inputCount-${inputCount}' rows="4" ></textarea>    
                     </div>
                     <button class='btn btn-reply btn-primary' type='submit' > Submit </button>
                 </form>
             `;

        e.path[1].innerHTML = e.path[1].innerHTML + textAreaForm;
        e.path[0].remove();

        inputCount++;
      }
    </script>
  </body>
</html>
