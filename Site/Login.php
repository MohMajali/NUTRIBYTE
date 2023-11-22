<?php
session_start();

include "../Connect.php";

if (isset($_POST['Submit'])) {

    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $query = mysqli_query($dbConn, "SELECT * FROM users WHERE email ='$Email' AND password = '$Password' AND active = 1");

    if (mysqli_num_rows($query) > 0) {

        $row = mysqli_fetch_array($query);

        if ($row['user_type_id'] == 4) {

        $U_ID = $row['id'];
        $_SESSION['U_Log'] = $U_ID;

            echo '<script language="JavaScript">
        document.location="index.php";
        </script>';

      }

    } else {

        echo '<script language="JavaScript">
	  alert ("Error ... Please Check Email Or Password !")
      </script>';
    }

} else if(isset($_POST['Register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $con_password = $_POST['con_password'];
  $image = 'user_images/defalutUser.png';
  $type = 4;

  if($password == $con_password){

    $query = mysqli_query($dbConn, "SELECT * FROM users WHERE email ='$Email'");

    if (mysqli_num_rows($query) > 0) {
  
      echo '<script language="JavaScript">
      alert ("Sorry, This Email Already Exist !")
        </script>';
  
          echo '<script language="JavaScript">
      document.location="./Login.php";
      </script>';
  
  } else {
  
    $insert = mysqli_query($dbConn, "INSERT INTO users (user_type_id, name, email, password, phone, image)
  
    Values ('$type', '$name', '$email', '$password', '$phone', '$image')");
  
            echo '<script language="JavaScript">
            alert ("Thank you For Registration !")
              </script>';
  
                echo '<script language="JavaScript">
            document.location="./Login.php";
            </script>';
  }
  } else {
    echo '<script language="JavaScript">
    alert ("Passwords Do Not Match !")
      </script>';
  }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>NUTRIBYTE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

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
    <!-- Favicon -->
    <link href="./assets/img/logo2.png" rel="icon" />

    <link href="./assets/css/login.css" rel="stylesheet" />
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
          id="navbarCollapse"
        >
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
            <a href="Login.php" class="nav-item nav-link">Login</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Nav Bar End -->
    <div class="login_logo">
        <div class="login_logo-line"></div>
        <p style="color: white; font-size: 50px">NUTRIBYTE</p>
      </div>



    <div class="wrapper">
      <div class="container">



        <div class="signup">Sign Up</div>
        <div class="login">Log In</div>

        <form class="signup-form" method="POST" action="Login.php">

        <label for="email">Email</label>
          <input
            type="email"
            class="input"
            name="email"
            required
          />

          <label for="email">User Name</label>
          <input
            type="text"
            class="input"
            name="name"
            
            required
          />

          <label for="email">Phone</label>
          <input
            type="text"
            class="input"
            name="phone"
            pattern="[0-9]{10}" 
            title="Phone Number Must Be 10 Numbers"
            required
          />

          <label for="email">Password</label>
          <input
            type="password"
            class="input"
            name="password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must Contain At Least One Number And One Uppercase And Lowercase Letter, And At Least 8 Or More Characters"
            required
          />

          <label for="email">Confirm Password</label>
          <input
            type="password"
            class="input"
            name="con_password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must Contain At Least One Number And One Uppercase And Lowercase Letter, And At Least 8 Or More Characters"
            required
          />

          <button type="submit" name="Register" class="btn">Create account</button>
        </form>

        <form class="login-form" method="POST" action="Login.php">
          


        <label for="email">Email</label>
          <input
            type="email"
            class="input"
            name="email"
          />
          
          <label for="email">Password</label>
          <input type="password" name="password" class="input" />
          <button type="submit" name="Submit" class="btn">log in</button>
        </form>
      </div>
    </div>

    <!-- Footer Start -->
    <?php include('./Footer.php');?>
    <!-- Footer End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
      $(".login-form").hide();
      $(".login").css("background", "rgba(52, 49, 72, 0.4)");
      $(".login").css("color", "#fff");

      $(".login").click(function () {
        $(".signup-form").hide();
        $(".login-form").show();
        $(".signup").css("background", "#34314866");
        $(".signup").css("color", "#fff");
        $(".login").css("color", "#000");
        $(".login").css("background", "#fff");
      });

      $(".signup").click(function () {
        $(".signup-form").show();
        $(".login-form").hide();
        $(".login").css("background", "#34314866");
        $(".login").css("color", "#fff");
        $(".signup").css("color", "#000");
        $(".signup").css("background", "#fff");
      });

      // $(".btn").click(function () {
      //   $(".input").val("");
      // });
    </script>
  </body>
</html>
