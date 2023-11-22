<?php 

session_start();
include '../Connect.php';

$U_ID = $_SESSION['U_Log'];
$N_ID = $_GET['id'];
$now = new DateTime();
$now = $now->format('Y-m-d H:i:s');

if($U_ID){

  $sql1 = mysqli_query($dbConn, "SELECT * FROM users WHERE id='$U_ID'");
  $row1 = mysqli_fetch_array($sql1);

  $name = $row1['name'];
  $email = $row1['email'];
  $created_at = $row1['created_at'];

}

$sql2 = mysqli_query($dbConn, "SELECT * FROM users WHERE id='$N_ID'");
$row2 = mysqli_fetch_array($sql2);

$n_name = $row2['name'];
$n_email = $row2['email'];
$n_image = $row2['image'];
$n_description = $row2['description'];
$total_rate = $row1['total_rate'];

$sql3 = mysqli_query($dbConn, "SELECT COUNT(id) AS COUNTID, to_date FROM subscriptions_payments WHERE user_id = '$U_ID'");
$row3 = mysqli_fetch_array($sql3);

$to_date = $row3['to_date'];
$COUNTID = $row3['COUNTID'];

if(isset($_POST['SUBMIT'])){

    $uId = $_POST['U_ID'];
    $nId = $_POST['N_ID'];

    $insert = mysqli_query($dbConn, "INSERT INTO reservations (nutrionist_id, user_id) VALUE ('$nId', '$uId')");

    echo "<script language='JavaScript'>
    alert ('Thank You For Starting With {$n_name}, Your Free Trial Will End After 2 Weeks')
    </script>";

    echo "<script language='JavaScript'>
    document.location='./NuritionExpertDetails.php?id={$nId}';
    </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>NUTRIBYTE</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
 

        <!-- Favicon -->
        <link href="./assets/img/logo2.png" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="./assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="./assets/lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="./assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="./assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="./assets/css/style.css" rel="stylesheet">
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
                <a href="index.php" class="navbar-brand"><img src="./assets/img/logo2.png" width="125px"
            /></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse">
          <div class="navbar-nav ml-auto">
            <a href="index.php" class="nav-item nav-link ">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="NuritionExperts.php" class="nav-item nav-link active"
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
                        <h2><?php echo $n_name?> Details</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href=""><?php echo $n_name?> Details</a>
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
                            <!-- <h2>Title Lorem ipsum dolor sit amet</h2> -->
                            <img src="../Nutrionist_Dashboard/<?php echo $n_image?>" />
                            <div class="class class-details-page">
                                <div class="class-teacher justify-content-between">
                                                                <div class="d-flex algin-items-center">
                                                                    <img src="../Nutrionist_Dashboard/<?php echo $n_image?>" alt="Image">
                                                                    <h3 class="mt-2"><?php echo $n_name?></h3>
                                                                    <h3 class="mt-2">

                                                                    <?php for($i=1; $i<=$total_rate; $i++){
                        echo '<img width="5px" height="5px" class="img" src="../Admin_Dashboard/star.png"/>'; 
                    }?>

                                                                    </h3>
                                                                </div>

                                                               <div class="d-flex flex-column mr-2 pr-4">
                                                                    <div class="promoCode mb-2">
                                                                        <form action="" method="POST">

                                                                            <input type="hidden" name="U_ID" value="<?php echo $U_ID?>">
                                                                            <input type="hidden" name="N_ID" value="<?php echo $N_ID?>">

                                                                            <button type="submit" name="SUBMIT" class="btn">Subscribe</button>
                                                                        </form>
                                                                    </div>
                                                                    
                                                                    <?php if($COUNTID > 0){ ?>
                                                                        <?php if(date('Y-m-d', strtotime($to_date)) > $now) { ?>
                                                                        <a href="./Chat.php?n_id=<?php echo $N_ID?>" class="btn btn-primary" role="button">Chat with Coach</a> 
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                               </div>
                                                            </div>
                            </div>
                            <p>
                                <?php echo $n_description?>
                            </p>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Single Post End-->   


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
    document.querySelectorAll('.single-tags-page a').forEach(el => {
        el.addEventListener('click',(e) => {
            e.preventDefault() 
            document.querySelectorAll('.single-tags-page a').forEach(el => {
                el.classList.remove('active') 
            })
            e.path[0].classList.add('active')

            
        })
    })

    
</script>
<script>

   let inputCount = 1;
   document.querySelectorAll('.btn-reply').forEach(btn => {
    btn.addEventListener('click', btnReplyFunc)
   })

   function btnReplyFunc (e) { 
            e.preventDefault()
            console.log(e)
            console.log(e.path[1])

            textAreaForm = `
                <form>
                    <div class='control-group'>
                        <textarea class='form-control' id='inputCount-${inputCount}' name='inputCount-${inputCount}' rows="4" ></textarea>    
                    </div>
                    <button class='btn btn-reply btn-primary' type='submit' > Submit </button>
                </form>
            `

            e.path[1].innerHTML = e.path[1].innerHTML + textAreaForm
            e.path[0].remove()
           
            inputCount++
        }

</script>
</body>
</html>
