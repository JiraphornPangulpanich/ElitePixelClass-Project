<?php
session_start();

// ถ้าไม่มี session username ให้ redirect กลับไปหน้า login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$fullname = $_SESSION["firstname"] . " " . $_SESSION["lastname"];
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ElitePixel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #007bff;
        }
        .team-member h5 {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
 <!-- Topbar Start -->
 <div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <?php 
                session_start(); // เริ่ม session

                // ตรวจสอบว่า session มีข้อมูลของผู้ใช้หรือไม่
                if (isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {
                    // ถ้ามีข้อมูลใน session แสดงชื่อเต็ม
                    $fullname = $_SESSION["firstname"] . " " . $_SESSION["lastname"];
                    echo '<span class="navbar-text text-body">👤 ' . $fullname . '!</span>';
                } else {
                    // ถ้าไม่มีข้อมูลใน session แสดงข้อความ "โปรดเข้าสู่ระบบ"
                    echo '<span class="navbar-text text-body">โปรดเข้าสู่ระบบ</span>';
                }
                ?>
            </div>    
        </div>

        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="dropdown-item" href="Team1.php">Team</a>
                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="index.php">Sign in</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
            </div>
        </div>

        <div class="d-inline-flex align-items-center d-block d-lg-none">
            <a href="" class="btn px-0 ml-2">
                <i class="fas fa-heart text-dark"></i>
                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
            </a>
            <a href="" class="btn px-0 ml-2">
                <i class="fas fa-shopping-cart text-dark"></i>
                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
            </a>
        </div>
    </div>
    
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="index1.php" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Elite</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Pixel</span>
            </a>
        </div>

        <div class="col-lg-4 col-6 text-left">
        <form action="search.php" method="POST" class="search-form">
    <div class="input-group">
        <input type="text" name="search_query" placeholder="ค้นหาสินค้า..." class="search-input" required>
        <button type="submit" class="search-btn">🔍 ค้นหา</button>
    </div>
</form>

<!--สำหรับฟอร์มค้นหา -->
<style>
    .search-form {
        max-width: 500px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .input-group {
        display: flex;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 30px;
    }

    .search-input {
        flex: 1;
        padding: 10px 15px;
        font-size: 16px;
        border: 2px solid yellow;  /* เปลี่ยนสีขอบเป็นสีเหลือง */
        border-radius: 30px 0 0 30px;
        outline: none;
    }

    .search-btn {
        background-color: #FFD700; /* ปุ่มสีเหลือง */
        color: black;
        border: none;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 0 30px 30px 0;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-btn:hover {
        background-color: #ffcc00; /* สีเหลืองเข้มเมื่อ hover */
    }

    /* สำหรับมือถือ */
    @media (max-width: 768px) {
        .search-form {
            width: 90%;
        }
    }
</style>

        </div>

        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+012 345 6789</h5>
        </div>
    </div>
</div>
<!-- Topbar End -->




    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        
                        <a href="shop1.php?Categories=1" class="nav-item nav-link">keyboard</a>
                        <a href="shop1.php?Categories=2" class="nav-item nav-link">Gaming laptop</a>
                        <a href="shop1.php?Categories=3" class="nav-item nav-link">mouse</a>
                        <a href="shop1.php?Categories=4" class="nav-item nav-link">Gaming chair</a>
                        <a href="shop1.php?Categories=5" class="nav-item nav-link">Gaming mic</a>
                        <a href="shop1.php?Categories=6" class="nav-item nav-link">Joy stick & Console</a>
                        <a href="shop1.php?Categories=7" class="nav-item nav-link">speaker</a>
                        <a href="shop1.php?Categories=8" class="nav-item nav-link">Screen</a>
                        <a href="shop1.php?Categories=9" class="nav-item nav-link">Earphones</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Elite</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Pixel</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index1.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            
                            
                            <a href="contact1.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        
                        <a href="shop1.php?Categories=1" class="nav-item nav-link">keyboard</a>
                        <a href="shop1.php?Categories=2" class="nav-item nav-link">Gaming laptop</a>
                        <a href="shop1.php?Categories=3" class="nav-item nav-link">mouse</a>
                        <a href="shop1.php?Categories=4" class="nav-item nav-link">Gaming chair</a>
                        <a href="shop1.php?Categories=5" class="nav-item nav-link">Gaming mic</a>
                        <a href="shop1.php?Categories=6" class="nav-item nav-link">Joy stick & Console</a>
                        <a href="shop1.php?Categories=7" class="nav-item nav-link">speaker</a>
                        <a href="shop1.php?Categories=8" class="nav-item nav-link">Screen</a>
                        <a href="shop1.php?Categories=9" class="nav-item nav-link">Earphones</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Elite</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Pixel</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index1.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            
                            
                            <a href="contact1.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



 <div class="container py-5">
        <h2 class="text-center mb-5">Meet Our Team</h2>
        <div class="row justify-content-center">
            <!-- สมาชิกคนที่ 1 -->
            <div class="col-md-4 col-lg-2 team-member">
                <img src="img/4601.jpeg" alt="Member 1">
                <h5>ณัฐนัน์ สบายจิตร</h5>
            </div>
            <!-- สมาชิกคนที่ 2 -->
            <div class="col-md-4 col-lg-2 team-member">
                <img src="img/4618.jpeg" alt="Member 2">
                <h5>เพชรรัตน์ นิยมไทย</h5>
            </div>
            <!-- สมาชิกคนที่ 3 -->
            <div class="col-md-4 col-lg-2 team-member">
                <img src="img/4619.jpg" alt="Member 3">
                <h5>ภัทราวดี ศรีวรกุล</h5>
            </div>
            <!-- สมาชิกคนที่ 4 -->
            <div class="col-md-4 col-lg-2 team-member">
                <img src="img/4625.png" alt="Member 4">
                <h5>จีราภร ปานกุลพานิชย์</h5>
            </div>
            <!-- สมาชิกคนที่ 5 -->
            <div class="col-md-4 col-lg-2 team-member">
                <img src="img/4629.jpeg" alt="Member 5">
                <h5>ปรีญามล พลเกิ้น</h5>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">If you have any questions or if your product has any problems, please contact us immediately within 48 hours.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, Mahasarakham, moja</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>ElitePixel@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Please contact us as soon as possible.</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
