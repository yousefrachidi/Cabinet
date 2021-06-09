<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Cabinie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo.png" />

    <!--  Boostrap -->
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
    <!--  icon font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="js/jquery.min.js" charset="utf-8"></script>

    <!-- calender -->
    <link rel="stylesheet" href="css/fullcalandar.css" />
    <!-- Uikit -->
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <!--   style  -->
    <link rel="stylesheet" href="css/style.css">



</head>

<body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Mini <span>Project</span></h3>
        </div>
        <div class="right_area">
            <a href="#" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
        <div class="nav_bar" role="link" href="profiel.php">
            <a href="profiel.php">
                <img src="images/logo.png" class="mobile_profile_image" alt="">
            </a>

            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href="dashboard.php"><i class="fas  fa-desktop"></i><span>Dashboard</span></a>
            <a href="consultation.php"> <i class="far fa-folder-open"></i> <span>Consultation</span></a>
            <a href="rendez.php"><i class="fas fa-calendar-check"></i> <span>Rendez-vous</span></a>
            <a href="reception.php"><i class="fas fa-user-plus"></i><span>Reception</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
        </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
        <div class="profile_info">
            <a href="/profile/1/edit">
                <img src="images/logo.png" class="profile_image" alt="">
            </a>
            <h4> Admin </h4>
        </div>
        <a href="dashboard" id="dash"><i class="fas   fa-desktop"></i><span>Dashboard</span></a>
        <a href="consultation" id="consl"> <i class="far  fa-folder-open"></i> <span>Consultation</span></a>
        <a href="rendez" id="rende"><i class="fas fa-calendar-check"></i> <span>Rendez-vous</span></a>
        <a href="reception" id="recep"><i class="fas fa-user-plus"></i><span>Reception</span></a>
        <a href="#" id="r"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>
    <!--sidebar end-->


    <!-- star content -->

    @yield('content');

    <!-- end content -->



    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>

    <!-- js boostrap for navbar  -->

    <!-- <script src="../js/jquery-3.5.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script> -->

</body>

</html>