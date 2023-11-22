<?php
session_start();

include "../Connect.php";

$N_ID = $_SESSION['N_Log'];
$U_ID = $_GET['uId'];

if (!$N_ID) {

    echo '<script language="JavaScript">
    document.location="../Nutrionistlogin.php";
    </script>';

} else {
    $sql1 = mysqli_query($dbConn, "select * from users where id='$N_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];
    $image = $row1['image'];

    $sql2 = mysqli_query($dbConn, "select * from users where id='$U_ID'");
    $row2 = mysqli_fetch_array($sql2);

    $u_name = $row2['name'];

    if(isset($_POST['Submit'])){

        $nId = $_POST['N_ID'];
        $uId = $_POST['uId'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $meal_category_id = $_POST['meal_category_id'];
        $week_number = $_POST['week_number'];

        $file;

        move_uploaded_file($_FILES["file"]["tmp_name"], "Food_Images/" . $_FILES["file"]["name"]);
        $file = $_FILES["file"]["name"];
        $file = 'Food_Images/' . $file;

        $insert = mysqli_query($dbConn, "INSERT INTO meal_plans (expert_id, user_id, name, description, price, image, meal_category_id, week_number)

        Values ('$nId', '$uId', '$name', '$description', '$price', '$file', '$meal_category_id', '$week_number')");
//============================================================================================================

        echo "<script language='JavaScript'>
          alert ('A New Food Plan Has Been Added Successfully !');
     </script>";

        echo "<script language='JavaScript'>
    document.location='ViewFoodPlan.php?nId={$nId}&&uId={$uId}';
       </script>";
    }
}

?>

<!DOCTYPE html>
<html >
    <head>
    <base href="">
    <title>NUTRIBYTE</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:site_name" content="360Angles" />
      <link rel="shortcut icon" type="image/png" href="../assets/img/logo2.png" />
      <link rel=icon href="../assets/img/logo2.png" type="image/x-icon">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="../assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    
        <link href="../assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="../assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
     
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css" integrity="sha512-ioRJH7yXnyX+7fXTQEKPULWkMn3CqMcapK0NNtCN8q//sW7ZeVFcbMJ9RvX99TwDg6P8rAH2IqUSt2TLab4Xmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css?v=2" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
 
 
        <link href="./dist/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/site.css" rel="stylesheet" />
      
</head> 
<body id="kt_body"   class="header-fixed hseader-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
  
    <div class="well" style="display:flex;z-index:999;visibility: hidden;"> <span class="show-link overlaySubsPage btn btn-danger" data-selector="#kt_content ">Focus H1</span> <span class="show-link overlaySubscripe btn btn-danger" data-selector=".subscriptionOverlay">Focus menuitem</span><span class="show-link modalUpgrade btn btn-danger" data-selector="#Upgrade">Focus menuitem</span>  </div>
    <div class="d-flex flex-column flex-root"> 
        <div class="page d-flex flex-row flex-column-fluid">

  
            <div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
            
            
                <div class="aside-secondary d-flex flex-row-fluid">
                 <div class="first_circle"></div>
                 <div class="seocnd_circle"></div>
                 <?php include('./AsideNav.php');?>
                </div> 
                <!-- <button id="arrowLeftSide" class="btn btn-sm btn-icon bg-body btn-color-gray-700 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize" style="margin-bottom: 1.35rem">
     
                    <span class="svg-icon svg-icon-2 rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black"></rect>
                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black"></path>
                        </svg>
                    </span> 
                </button> -->
    
            </div>
            <!--end::aside-->
            <!--begin::Wrapper-->

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="animation-duration: 0.3s;">
                
                    <div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
                        <div class="page-title d-flex flex-column w-100 align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

                            <div class="d-flex align-items-center justify-content-between w-100">
                               <div>
                                <h1 class="text-dark fw-bolder my-0 fs-1"><?php echo $u_name?> Food Plans</h1>
                               </div>

                               <?php include('./includes/Name.php');?>
                            </div>
                        </div>

                        <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                            <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"></path>
                                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"></path>
                                    </svg>
                                </span>
                            </div>
                            <a href="?page=index" class="d-flex align-items-center">
                                <img alt="Logo" src="../assets/img/logo2.png" class="h-30px">
                            </a>
                        </div>
                    </div> 
                </div> 
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">                   


                    <!--------body--------->

<!--begin::Content--> 
<div class="container-xxl" id="kt_content_container">
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer align-items-center" role="button" data-bs-toggle="" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0"><?php echo $u_name?> Food Plans</h3>
            </div> 
            <div style="margin-left:auto">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" tooltip="Add Teacher" data-bs-toggle="modal" data-bs-target="#AddTeacher">

                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                        </svg>
                    </span>
                    <span class="d-none d-md-inline">Add Food Plan</span>
                </a>
            </div>

            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show"> 
            <form method="post" id="Company" enctype="multipart/form-data" > 
                <div class="card-body border-top p-9"> 
                        <table class="table">
                            <thead>
                                <tr class="fw-bolder  ">
                                    <th>Meal Image</th>
                                    <th>Meal ID</th>
                                    <th>Meal Name</th>
                                    <th>Week Number</th>
                                    <th>Meal Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                     <?php
$sql1 = mysqli_query($dbConn, "SELECT * FROM meal_plans WHERE expert_id = '$N_ID' AND user_id = '$U_ID' ORDER BY id DESC");

if (mysqli_num_rows($sql1) > 0) {

    while ($row1 = mysqli_fetch_array($sql1)) {

        $f_id = $row1['id'];
        $f_name = $row1['name'];
        $f_price = $row1['price'];
        $f_image = $row1['image'];
        $active = $row1['active'];
        $week_number = $row1['week_number'];
        $meal_category_id = $row1['meal_category_id'];

        $sql2 = mysqli_query($dbConn, "select * from categories where id='$meal_category_id'");
        $row2 = mysqli_fetch_array($sql2);
    
        $c_name = $row2['name'];

        ?>
                                <tr role="row" class="odd">
                                    
                                    <td class=" "><img src="./<?php echo $f_image; ?>" height="150px" width="150px" alt=""></td>
                                    <td class=" "><?php echo $f_id; ?></td>
                                    <td class=" "><?php echo $f_name; ?></td>
                                    <td class=" "><?php echo $week_number; ?></td>
                                    <td class=" "><?php echo $c_name; ?></td>
                                    <td class=" ">

                                        <?php if($active == 1) { ?>

                                            <a href="BlockUnBlockMeal.php?id=<?php echo $f_id ?>" class="btn btn-danger" role="button">In-Active</a>

                                        <?php } else { ?>

                                            <a href="BlockUnBlockMeal.php?id=<?php echo $f_id ?>" class="btn btn-danger" role="button">Active</a>

                                        <?php } ?>

                                        <a href="EditPlan.php?id=<?php echo $f_id ?>&&uId=<?php echo $U_ID?>" class="btn btn-primary" role="button">Edit</a>
                                        
                                    </td>

                                </tr>
                        <?php

    }

    ?>
                            </tbody>
                        </table>


                        <?php } else {
    echo '
                      </tbody>
                   </table>
                      <div class="notFound_card">
                         <div class="notFound_card-content text-gray-400 fs-4 fw-bold mb-10 mt-10">
                            There Are No Food Plans Added Yet.
                         </div>
                      </div>';
}?>

</tbody>
                        </table>


                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                    </div>
                    <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->

</div>
       
    <!--End::Drawers-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
 </div>
 </div>
 </div>
</div>
  
    <!--begin::Modal - Invite Friends-->
    <div class="modal fade" id="AddTeacher" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-center">
                    <div class="text-center mb-8 mt-2 d-flex align-items-center">
                        <h1 class="mb-3">Add Plan</h1>
                        <i class="fas fa-exclamation-circle f-white ms-2 fs-5" data-bs-toggle="tooltip" title="Add Teacher" data-bs-original-title="Add Employee" aria-label="Add Employee"></i>

                    </div>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-4  pb-3 pt-3 modal-body-AddEmplyee">

                    <div class="mb-10">
                        <form class="form" class="addDateTime_form" method="post" action="ViewFoodPlan.php?nId=<?php echo $N_ID?>&&uId=<?php echo $U_ID?>" enctype="multipart/form-data">
                            <input type="hidden" name="N_ID" value="<?php echo $N_ID ?>"/>
                            <input type="hidden" name="uId" value="<?php echo $U_ID ?>"/>
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <h3 class="mb-10">Food Plan Basic Info</h3>

                                
                     <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                        <div class="col-lg-8">
                           <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(../assets/dist/assets/media/avatars/blank.png)">
                              <div id="image" class="image-input-wrapper w-125px h-125px" style="background-image: url(./<?php echo $image?>)"></div>
                              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                              <i class="bi bi-pencil-fill fs-7"></i>
                              <input name="file" type="file" class="user-photo-action" placeholder="Click here to upload" accept=".jpg, .jpeg, .png">
                              </label>
                              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                              <i class="bi bi-x fs-2"></i>
                              </span>
                           </div>
                           <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                     </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Food Meal name</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="name" required/>
                                    </div> 
                                </div> 
                                
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Food Meal Description</label>
                                    <div class="col-lg-8 fv-row">
                                        <!-- <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="name" required/> -->
                                        <textarea name="description" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="" cols="30" rows="10"></textarea>
                                    </div> 
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Week</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="number" min="0" step="1" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="week_number" required/>
                                    </div> 
                                </div>

                                <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Meal Category Name</label>
                                <div class="col-lg-8 fv-row">
                                    <?php
$query1 = mysqli_query($dbConn, "SELECT * FROM categories");

    echo '<select name="meal_category_id"  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required>';
    echo '<option disabled selected value>Select Category Name</option>';

while ($row1 = mysqli_fetch_array($query1)) {
    echo '<option value="' . $row1['id'] . '">' . $row1['name'] . '</option>';
}
echo '</select>';
?>
                                
                                </div>
                            </div>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <input type="submit" class="btn btn-primary" id="regformbutt" name="Submit" value="Save">
                                </div>
                                
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Modal - Invite Friend-->
    <!--============  Delete Modal ===================-->


    <div id="DeleteModal" name="DeleteModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-start">
                    <h5 class="modal-title" style="color:#fff">Confirm</h5>
                    <i class="fas fa-exclamation-circle f-white ms-2 fs-5" data-bs-toggle="tooltip" title="Confirm" data-bs-original-title="Confirm" aria-label="Confirm"></i>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <div class="modal-body">
                    <p id="modalText"></p>
                </div>
                <div class="modal-footer">
                    <a href="" id="modalBtn" class="btn btn-primary">Yes</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>


                </div>
            </div>
        </div>
    </div>


 
    <script>
        var hostUrl = "../assets/dist/assets/"
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=2"></script>
        <script src="../assets/dist/assets/plugins/global/plugins.bundle.js"></script>
        <script src="../assets/dist/assets/js/scripts.bundle.js"></script>
    
        <script async src="../assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    
        <script async src="../assets/dist/assets/js/custom/widgets.js"></script>
        <script async src="../assets/dist/assets/js/custom/apps/chat/chat.js"></script>
        <script defer src="../assets/dist/assets/js/custom/modals/create-app.js"></script>
        <script defer src="../assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>
        <script defer src="../assets/dist/assets/js/cxustom/intro.js"></script> 
    
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
     
     
        <script async src="../assets/js/dashboard.js"></script>
     
     <script>
        window.addEventListener('DOMContentLoaded', (event) => {
         document.querySelector('#kt_aside_nav_tab_menu .menu-item:nth-child(6) .menu-link').classList.add('active')
    
       });
   
   </script>
    
    </body>
    <!--end::Body-->
    </html>