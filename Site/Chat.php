<?php 

session_start();
include '../Connect.php';

$U_ID = $_SESSION['U_Log'];
$N_ID = $_GET['n_id'];

if($U_ID){

  $sql1 = mysqli_query($dbConn, "select * from users where id='$U_ID'");
  $row1 = mysqli_fetch_array($sql1);

  $name = $row1['name'];
  $email = $row1['email'];

}

$sql2 = mysqli_query($dbConn, "select * from users where id='$N_ID'");
$row2 = mysqli_fetch_array($sql2);

$n_name = $row2['name'];
$n_email = $row2['email'];

if (isset($_POST['Submit'])) {
  $expert_id = $_POST['expert_id'];
  $user_id = $_POST['user_id'];
  $user_chat = $_POST['user_chat'];


  $insert = mysqli_query($dbConn, "INSERT INTO chats (expert_id, user_id, user_chat) values ('$expert_id', '$user_id','$user_chat')");
  
  echo "<script language='JavaScript'>
  document.location='Chat.php?n_id={$expert_id}';
          </script>";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>NUTRIBYTE</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:site_name" content="Coachs" />
    <link rel="shortcut icon" type="image/png" href="./assets/img/logo2.png" />
    <link rel="icon" href="/assets/img/logo2.png" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />

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

    <link
      href="../assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="../assets/dist/assets/plugins/global/plugins.bundle.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="../assets/dist/assets/css/style.bundle.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css?v=2"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css?v=2"
    />
    <link href="../assets/css/site.css" rel="stylesheet" />

    <style>
      .navbar {
        top: 0px;
      }
    </style>
  </head>
  <body
    id="kt_body"
    style="background-image: url()"
    class="header-fixed hseader-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled"
  >
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
        <a href="index.html" class="navbar-brand">
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

    <div class="well" style="display: flex; z-index: 999; visibility: hidden">
      <span
        class="show-link overlaySubsPage btn btn-danger"
        data-selector="#kt_content "
        >Focus H1</span
      >
      <span
        class="show-link overlaySubscripe btn btn-danger"
        data-selector=".subscriptionOverlay"
        >Focus menuitem</span
      ><span
        class="show-link modalUpgrade btn btn-danger"
        data-selector="#Upgrade"
        >Focus menuitem</span
      >
    </div>
    <div class="d-flex flex-column flex-root">
      <div class="page d-flex flex-row flex-column-fluid">
        <div
          class="wrapper d-flex flex-column flex-row-fluid p-0"
          id="kt_wrapper"
        >
          <div
            class="content d-flex flex-column flex-column-fluid"
            id="kt_content"
          >
            <!---------------body--------->

            <div class="container-xxl mt-4 pb-20" id="kt_content_container">
              <h1 class="text-dark fw-bolder my-0 fs-2 mb-5 pl-4">Chat Page</h1>
              <div class="d-flex flex-column flex-lg-row">
                <div
                  class="flex-column flex-lg-row-auto w-100 col-12 mb-10 mb-lg-0"
                >
                  <div class="card" id="kt_chat_messenger">

                    <div class="card-header" id="kt_chat_messenger_header">
                      <div class="card-title">
                        <div
                          class="d-flex justify-content-center flex-column me-3"
                        >
                          <a
                            href="#"
                            class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1"
                            ><?php echo $n_name?></a
                          >
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-body" id="kt_chat_messenger_body">
                      <!--begin::Messages-->
                      <div
                        class="scroll-y me-n5 pe-5 h-300px h-lg-auto"
                        data-kt-element="messages"
                        data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                        data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body"
                        data-kt-scroll-offset="5px"
                        style="max-height: 241px"
                      >

                      <?php
$sql1 = mysqli_query($dbConn, "SELECT * from chats WHERE user_id = '$U_ID' AND expert_id = '$N_ID'");
while ($row1 = mysqli_fetch_array($sql1)) {

    $Chat_ID = $row1['id'];
    $user_id = $row1['user_id'];
    $expert_id = $row1['expert_id'];
    $user_chat = $row1['user_chat'];
    $nutrition_chat = $row1['nutrition_chat'];
    
    $sql2 = mysqli_query($dbConn, "select * from users where id='$expert_id'");
    $row2 = mysqli_fetch_array($sql2);
    $N_Name = $row2['name'];
    $N_image = $row2['image'];
    
    $sql2 = mysqli_query($dbConn, "select * from users where id='$user_id'");
    $row2 = mysqli_fetch_array($sql2);
    $Customer_Name = $row2['name'];
    $Customer_image = $row2['image'];

    ?>

                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10">
                          <!--begin::Wrapper-->
                          <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                              <!--begin::Avatar-->
                              <div class="symbol symbol-35px symbol-circle">
                                <img
                                  alt="Pic"
                                  src="../Nutrionist_Dashboard/Nutrionist_images/defalutUser.png"
                                />
                              </div>
                              <!--end::Avatar-->
                              <!--begin::Details-->
                              <div class="ms-3">
                                <a
                                  href="#"
                                  class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1"
                                  ><?php echo $Customer_Name?></a
                                >
                              </div>
                              <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div
                              class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                              data-kt-element="message-text"
                            >
                              <?php echo $user_chat ?>
                            </div>
                            <!--end::Text-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->





                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10">
                          <!--begin::Wrapper-->
                          <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                              <!--begin::Details-->
                              <div class="me-3">
                                <a
                                  href="#"
                                  class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1"
                                  ><?php echo $N_Name?></a
                                >
                              </div>
                              <!--end::Details-->
                              <!--begin::Avatar-->
                              <div class="symbol symbol-35px symbol-circle">
                                <img
                                  alt="Pic"
                                  src="../Nutrionist_Dashboard/<?php echo $N_image?>"
                                />
                              </div>
                              <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div
                              class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                              data-kt-element="message-text"
                            >
                            <?php echo $nutrition_chat ?>
                            </div>
                            <!--end::Text-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->





                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10">
                          <!--begin::Wrapper-->
                          <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                              <!--begin::Avatar-->
                              <!--end::Avatar-->
                              <!--begin::Details-->
                              <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <!--end::Text-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->

<?php } ?>


                        <!--end::Message(template for in)-->
                      </div>
                      <!--end::Messages-->
                    </div>
                    <!--end::Card body-->


                    <!--begin::Card footer-->
                    <form action="Chat.php?n_id=<?php echo $N_ID?>" method="POST">
                  <input type="hidden" name="expert_id" id="UserID" value="<?php echo $N_ID; ?>" />
                  <input type="hidden" name="user_id" id="UserID" value="<?php echo $U_ID; ?>" />

                    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                      <!--begin::Input-->
                      <textarea
                        class="form-control form-control-flush mb-3"
                        rows="1"
                        data-kt-element="input"
                        name="user_chat"
                        placeholder="Type a message"
                      ></textarea>
                      <!--end::Input-->
                      <!--begin:Toolbar-->
                      <div class="d-flex flex-stack">
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center me-2"></div>
                        <!--end::Actions-->
                        <!--begin::Send-->
                        <button
                          class="btn btn-primary"
                          type="submit"
                          name="Submit"
                          data-kt-element="send"
                        >
                          Send
                        </button>
                        <!--end::Send-->
                      </div>
                      <!--end::Toolbar-->
                    </div>  

                  </form>
                    <!--end::Card footer-->


                  </div>
                </div>
                <!--end::Content-->
              </div>
            </div>

            <!-- <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
					 
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
						 
					</div> -->
          </div>
        </div>
      </div>
    </div>

    <div
      id="kt_activities"
      class="bg-body"
      data-kt-drawer="true"
      data-kt-drawer-name="activities"
      data-kt-drawer-activate="true"
      data-kt-drawer-overlay="true"
      data-kt-drawer-width="{default:'300px', 'lg': '900px'}"
      data-kt-drawer-direction="start"
      data-kt-drawer-toggle="#kt_activities_toggle"
      data-kt-drawer-close="#kt_activities_close"
    >
      <div class="card shadow-none rounded-0">
        <div class="card-header" id="kt_activities_header">
          <h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
          <div class="card-toolbar">
            <button
              type="button"
              class="btn btn-sm btn-icon btn-active-light-primary me-n5"
              id="kt_activities_close"
            >
              <span class="svg-icon svg-icon-1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <rect
                    opacity="0.5"
                    x="6"
                    y="17.3137"
                    width="16"
                    height="2"
                    rx="1"
                    transform="rotate(-45 6 17.3137)"
                    fill="black"
                  />
                  <rect
                    x="7.41422"
                    y="6"
                    width="16"
                    height="2"
                    rx="1"
                    transform="rotate(45 7.41422 6)"
                    fill="black"
                  />
                </svg>
              </span>
            </button>
          </div>
        </div>

        <div class="card-footer py-5 text-center" id="kt_activities_footer">
          <a
            href="?page=pages/profile/activity"
            class="btn btn-bg-body text-primary"
            >View All Activities

            <span class="svg-icon svg-icon-3 svg-icon-primary">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
              >
                <rect
                  opacity="0.5"
                  x="18"
                  y="13"
                  width="13"
                  height="2"
                  rx="1"
                  transform="rotate(-180 18 13)"
                  fill="black"
                />
                <path
                  d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                  fill="black"
                />
              </svg>
            </span>
          </a>
        </div>
      </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <span class="svg-icon">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
        >
          <rect
            opacity="0.5"
            x="13"
            y="6"
            width="13"
            height="2"
            rx="1"
            transform="rotate(90 13 6)"
            fill="black"
          />
          <path
            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
            fill="black"
          />
        </svg>
      </span>
    </div>

    <!--============  Delete Modal ===================-->

    <div id="DeleteModal" name="DeleteModal" class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div
            class="modal-header d-flex align-items-center justify-content-start"
          >
            <h5 class="modal-title" style="color: #fff">Confirm</h5>
            <i
              class="fas fa-exclamation-circle f-white ms-2 fs-5"
              data-bs-toggle="tooltip"
              title="Confirm"
              data-bs-original-title="Confirm"
              aria-label="Confirm"
            ></i>
            <div
              class="btn btn-sm btn-icon btn-active-color-primary"
              data-bs-dismiss="modal"
            >
              <span class="svg-icon svg-icon-1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <rect
                    opacity="0.5"
                    x="6"
                    y="17.3137"
                    width="16"
                    height="2"
                    rx="1"
                    transform="rotate(-45 6 17.3137)"
                    fill="black"
                  />
                  <rect
                    x="7.41422"
                    y="6"
                    width="16"
                    height="2"
                    rx="1"
                    transform="rotate(45 7.41422 6)"
                    fill="black"
                  />
                </svg>
              </span>
            </div>
          </div>
          <div class="modal-body">
            <p id="modalText"></p>
          </div>
          <div class="modal-footer">
            <a href="" id="modalBtn" class="btn btn-primary">Yes</a>
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              No
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Start -->
    <?php include('./Footer.php');?>
    <!-- Footer End -->

    <script>
      var hostUrl = "../assets/dist/assets/";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=2"></script>
    <script src="../assets/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="../assets/dist/assets/js/scripts.bundle.js"></script>

    <script
      async
      src="../assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"
    ></script>

    <!--<script async src="../assets/dist/assets/js/custom/widgets.js"></script>
    <script async src="../assets/dist/assets/js/custom/apps/chat/chat.js"></script>
    <script defer src="../assets/dist/assets/js/custom/modals/create-app.js"></script>
    <script defer src="../assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>
    <script defer src="../assets/dist/assets/js/cxustom/intro.js"></script> -->

    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"
    ></script>

    <script async src="../assets/js/dashboard.js"></script>

    <script>
      window.addEventListener("DOMContentLoaded", (event) => {
        document
          .querySelector(
            "#kt_aside_nav_tab_menu .menu-item:nth-child(8) .menu-link"
          )
          .classList.add("active");
      });
    </script>
  </body>
  <!--end::Body-->
</html>
