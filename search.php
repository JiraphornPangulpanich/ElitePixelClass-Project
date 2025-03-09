<?php

include 'connectdb.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];

    // ป้องกัน SQL Injection
    $search_query = $conn->real_escape_string($search_query);

    // ค้นหาสินค้า
    $sql = "SELECT * FROM Product WHERE Name LIKE '%$search_query%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8">
    <title> ElitePixel </title>
    
   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

<style>
 .bn1 {
  transition-duration: 0.4s;
}

.bn1:hover {
  background-color: #04AA6D; /* Green */
  color: white;
}
</style>
   
    
</head>

    <meta charset="UTF-8">
    <title>ผลการค้นหา</title>
    <link rel="stylesheet" href="styles.css">
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
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="index.php">Sign in</a>
                            <a class="dropdown-item" href="Team1.php">Team</a>
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
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index1.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Elite</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Pixel</span>
                </a>
            </div>
        
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



        

            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <div class="container">
        <h2>ผลลัพธ์การค้นหา: "<?php echo htmlspecialchars($search_query); ?>"</h2>

        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-3">
                        <div class="product-item">
                            <img src="img/' . $row["Iditem"] . '.jpg" class="product-img">
                            <h5>' . $row["Name"] . '</h5>
                            <p>ราคา: $' . $row["Price"] . '</p>
                            <a href="detail1.php?Iditem=' . $row["Iditem"] . '" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>
                    </div>';
                }
            } else {
                echo "<p>ไม่พบสินค้า</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
