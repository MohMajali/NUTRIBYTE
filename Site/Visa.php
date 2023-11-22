<?php

session_start();
include '../Connect.php';

$U_ID = $_SESSION['U_Log'];
$F_ID = $_GET['mealId'];
$N_ID = $_GET['nutrionId'];
$P_ID = $_GET['providerId'];
$order = $_GET['order'];
$payment = $_GET['payment'];
$Subscription_Type = $_GET['Subscription_Type'];

if ($U_ID) {

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

if (isset($_POST['SUBMITE'])) {

    $provider_id = $_POST['provider_id'];
    $user_id = $_POST['user_id'];
    $meal_id = $_POST['meal_id'];
    $promo_code_id = $_POST['promo_code_id'];
    $status_id = 1;

    if (!$promo_code_id) {

        $insert = mysqli_query($dbConn, "INSERT INTO orders (provider_id, user_id, status_id, meal_id)
    VALUES ('$provider_id', '$user_id', '$status_id', '$meal_id')");

        echo "<script language='JavaScript'>
            alert ('Thank You For Ordering')
            </script>";

        echo "<script language='JavaScript'>
            document.location='./MyOrder.php';
            </script>";

    } else {

        $insert = mysqli_query($dbConn, "INSERT INTO orders (provider_id, user_id, status_id, meal_id, promo_code_id)
    VALUES ('$provider_id', '$user_id', '$status_id', '$meal_id', '$promo_code_id')");

        echo "<script language='JavaScript'>
                alert ('Thank You For Ordering')
                </script>";

        echo "<script language='JavaScript'>
                document.location='./MyOrder.php';
                </script>";

    }

} else if (isset($_POST['Subscribe'])) {

    $user_id = $_POST['user_id'];
    $Subscription_Type = $_POST['Subscription_Type'];
    $now = new DateTime();
    $From_Date = $now->format('Y-m-d H:i:s');

    if ($Subscription_Type == '1') {

        $To_Date = date('d-m-Y', strtotime($From_Date . ' +30 days'));

    } elseif ($Subscription_Type == '2') {

        $To_Date = date('d-m-Y', strtotime($From_Date . ' +60 days'));

    } elseif ($Subscription_Type == '3') {

        $To_Date = date('d-m-Y', strtotime($From_Date . ' +90 days'));

    }

    $insert = mysqli_query($dbConn, "INSERT INTO subscriptions_payments (user_id, subscription_type, payment_type, from_date, to_date)
  Values ('$user_id', '$Subscription_Type', 'CC/DC', '$From_Date', '$To_Date')");

    echo "<script language='JavaScript'>
          alert ('New Subscription Has Been Added !');
          </script>";

    echo "<script language='JavaScript'>
          document.location='./index.php';
          </script>";

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

    <link href="./assets/css/style.css" rel="stylesheet" />
    <link href="./assets/css/visa.css" rel="stylesheet" />
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
            <a href="index.php" class="nav-item nav-link ">Home</a>
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

    <div class="checkout">
      <div class="credit-card-box">
        <div class="flip">
          <div class="front">
            <div class="chip"></div>
            <div class="logo">
              <svg
                version="1.1"
                id="visa"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                width="47.834px"
                height="47.834px"
                viewBox="0 0 47.834 47.834"
                style="enable-background: new 0 0 47.834 47.834"
              >
                <g>
                  <g>
                    <path
                      d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                           c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                           c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                           M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                           c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                           c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                           l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                           C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                           C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                           c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                           h-3.888L19.153,16.8z"
                    />
                  </g>
                </g>
              </svg>
            </div>
            <div class="number"></div>
            <div class="card-holder">
              <label>Card holder</label>
              <div></div>
            </div>
            <div class="card-expiration-date">
              <label>Expires</label>
              <div></div>
            </div>
          </div>
          <div class="back">
            <div class="strip"></div>
            <div class="logo">
              <svg
                version="1.1"
                id="visa"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                width="47.834px"
                height="47.834px"
                viewBox="0 0 47.834 47.834"
                style="enable-background: new 0 0 47.834 47.834"
              >
                <g>
                  <g>
                    <path
                      d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                           c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                           c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                           M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                           c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                           c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                           l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                           C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                           C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                           c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                           h-3.888L19.153,16.8z"
                    />
                  </g>
                </g>
              </svg>
            </div>
            <div class="ccv">
              <label>CCV</label>
              <div></div>
            </div>
          </div>
        </div>
      </div>
      <form class="form"
      autocomplete="off"
      method="POST"
      action="<?php

if ($payment) {

    echo "Visa.php?payment=" . $payment . "&&Subscription_Type=" . $Subscription_Type;

} else {

    echo "Visa.php?mealId=" . $F_ID . "&&nutrionId=" . $N_ID . "&&order=" . $order;

}

?>"
      novalidate>

      <input type="hidden" name="provider_id" value="<?php echo $P_ID ?>" id="">
      <input type="hidden" name="user_id" value="<?php echo $U_ID ?>" id="">
      <input type="hidden" name="meal_id" value="<?php echo $F_ID ?>" id="">
      <input type="hidden" name="Subscription_Type" value="<?php echo $Subscription_Type ?>" id="">

        <fieldset>
          <label for="card-number">Card Number</label>
          <input
            type="num"
            id="card-number"
            class="input-cart-number"
            maxlength="4"
          />
          <input
            type="num"
            id="card-number-1"
            class="input-cart-number"
            maxlength="4"
          />
          <input
            type="num"
            id="card-number-2"
            class="input-cart-number"
            maxlength="4"
          />
          <input
            type="num"
            id="card-number-3"
            class="input-cart-number"
            maxlength="4"
          />

        </fieldset>

        <fieldset>
          <label for="card-holder">Card holder</label>
          <input type="text" id="card-holder" />
        </fieldset>

        <fieldset class="fieldset-expiration">
          <label for="card-expiration-month">Expiration date</label>
          <div class="select">
            <select id="card-expiration-month">
              <option></option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
          </div>
          <div class="select">
            <select id="card-expiration-year">
              <option></option>
              <option>2016</option>
              <option>2017</option>
              <option>2018</option>
              <option>2019</option>
              <option>2020</option>
              <option>2021</option>
              <option>2022</option>
              <option>2023</option>
              <option>2024</option>
              <option>2025</option>
            </select>
          </div>
        </fieldset>
        <fieldset class="fieldset-ccv">
          <label for="card-ccv">CCV</label>
          <input type="text" id="card-ccv" maxlength="3" />
        </fieldset>

        <?php if (!$payment) {?>

        <fieldset class="">
          <div class="select" sty>
          <?php
$query1 = mysqli_query($dbConn, "SELECT * FROM promo_codes WHERE active = 1");

    echo '<select name="promo_code_id"  class="plan">';
    echo '<option disabled selected value>Select Promo Code</option>';

    while ($row1 = mysqli_fetch_array($query1)) {
        echo '<option value="' . $row1['id'] . '">' . $row1['code'] . '</option>';
    }
    echo '</select>';
    ?>


          </div>
        </fieldset>
        <?php }?>

        <button type="submit" name="<?php

if ($payment) {
    echo "Subscribe";
} else {
    echo "SUBMITE";
}

?>" class="btn"><i class="fa fa-lock"></i> submit</button>
      </form>
    </div>

    <!-- Footer Start -->
    <?php include './Footer.php';?>
    <!-- Footer End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/lib/easing/easing.min.js"></script>
    <script src="./assets/lib/wow/wow.min.js"></script>
    <script src="./assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./assets/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="./assets/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->

    <script>
      $(".input-cart-number").on("keyup change", function () {
        $t = $(this);

        if ($t.val().length > 3) {
          $t.next().focus();
        }

        var card_number = "";
        $(".input-cart-number").each(function () {
          card_number += $(this).val() + " ";
          if ($(this).val().length == 4) {
            $(this).next().focus();
          }
        });

        $(".credit-card-box .number").html(card_number);
      });

      $("#card-holder").on("keyup change", function () {
        $t = $(this);
        $(".credit-card-box .card-holder div").html($t.val());
      });

      $("#card-holder").on("keyup change", function () {
        $t = $(this);
        $(".credit-card-box .card-holder div").html($t.val());
      });

      $("#card-expiration-month, #card-expiration-year").change(function () {
        m = $("#card-expiration-month option").index(
          $("#card-expiration-month option:selected")
        );
        m = m < 10 ? "0" + m : m;
        y = $("#card-expiration-year").val().substr(2, 2);
        $(".card-expiration-date div").html(m + "/" + y);
      });

      $("#card-ccv")
        .on("focus", function () {
          $(".credit-card-box").addClass("hover");
        })
        .on("blur", function () {
          $(".credit-card-box").removeClass("hover");
        })
        .on("keyup change", function () {
          $(".ccv div").html($(this).val());
        });

      /*--------------------
CodePen Tile Preview
--------------------*/
      setTimeout(function () {
        $("#card-ccv")
          .focus()
          .delay(1000)
          .queue(function () {
            $(this).blur().dequeue();
          });
      }, 500);

      /*function getCreditCardType(accountNumber) {
  if (/^5[1-5]/.test(accountNumber)) {
    result = 'mastercard';
  } else if (/^4/.test(accountNumber)) {
    result = 'visa';
  } else if ( /^(5018|5020|5038|6304|6759|676[1-3])/.test(accountNumber)) {
    result = 'maestro';
  } else {
    result = 'unknown'
  }
  return result;
}

$('#card-number').change(function(){
  console.log(getCreditCardType($(this).val()));
})*/
    </script>
  </body>
</html>
